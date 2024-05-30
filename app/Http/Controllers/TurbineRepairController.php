<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use App\Models\PurchaseItem;
use App\Models\PurchaseStatus;
use App\Models\TurbineRepair;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class TurbineRepairController extends Controller
{
    public function index()
    {
        return view('turbine-repairs.index', [
                "turbine_repairs" => TurbineRepair::query()->orderBy("number")->get()
            ]
        );
    }

    public function turbineRepairPDF(Request $request)
    {
        // Получение данных из запроса
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $clientId = $request->input('client_id');
        $orderStatusId = $request->input('order_status_id');

        // Преобразование дат в формат YYYY-MM-DD
        if ($startDate) {
            $startDate = Carbon::createFromFormat('d.m.Y', $startDate)->format('Y-m-d');
        }
        if ($endDate) {
            $endDate = Carbon::createFromFormat('d.m.Y', $endDate)->format('Y-m-d');
        }

        // Формирование запроса с фильтрацией
        $query = TurbineRepair::query();

        if ($startDate) {
            $query->whereRaw('DATE(created_at) >= ?', [$startDate]);
        }

        if ($endDate) {
            $query->whereRaw('DATE(created_at) <= ?', [$endDate]);
        }
        if ($clientId) {
            $query->where('client_id', $clientId);
        }
        if ($orderStatusId) {
            $query->where('order_status_id', $orderStatusId);
        }

        $filtered_repairs = $query->get();

        $number = $this->generateReportNumber();
        $total_money = $this->calculate_money($filtered_repairs);
        $done = $this->calculate_done($filtered_repairs);
        $done_before = $this->calculate_done_before($filtered_repairs);
        $done_after = $this->calculate_done_after($filtered_repairs);
        $bad = $this->calculate_unsuccessful($filtered_repairs);
        $cancelled = $this->calculate_cancelled($filtered_repairs);

        $data = [
            'number' => $number,
            'done' => $done * 100,
            'done_before' => $done_before * 100,
            'done_after' => $done_after * 100,
            'bad' => $bad * 100,
            'cancelled' => $cancelled * 100,
            'total_money' => $total_money,
            'reportDate' => now()->format('d.m.y'),
            'repairs' => $filtered_repairs,
        ];

        $pdf = PDF::loadView('turbine-repairs.pdf', compact('data'))
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function generateReportNumber(): string
    {
        $date = now()->format('d.m.y'); // Получаем текущую дату в формате ДД.ММ.ГГ

        // Получаем ключ для хранения последнего номера за текущий день
        $cacheKey = "turbine_repair_report_number_{$date}";

        // Получаем последний номер из кэша, если он существует
        $lastNumber = Cache::get($cacheKey, 0);

        // Увеличиваем номер
        $newNumber = $lastNumber + 1;

        // Проверяем, что номер не превышает 9999
        if ($newNumber > 9999) {
            throw new Exception("Номер превышает допустимый лимит за день");
        }

        // Форматируем номер с ведущими нулями
        $formattedNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        // Обновляем значение в кэше
        Cache::put($cacheKey, $newNumber, now()->endOfDay());

        return "$date-1-$formattedNumber";
    }

    public function calculate_money($filtered_repairs): float
    {
        $totalMoney = $filtered_repairs->sum(function ($repair) {
            return $repair->price;
        });

        return round($totalMoney, 2); // Округление до 2 знаков после запятой
    }

    public function calculate_done($filtered_repairs): float
    {
        // Получаем общее количество отфильтрованных записей
        $totalRecords = $filtered_repairs->count();

        // Получаем статус "Исполнен"
        $doneStatus = OrderStatus::where('name', 'Исполнен')->first();

        // Если статус "Исполнен" не найден, устанавливаем count принятых записей в 0
        $doneRecords = 0;

        if ($doneStatus) {
            // Получаем количество отфильтрованных записей со статусом "Исполнен"
            $doneRecords = $filtered_repairs->where('order_status_id', $doneStatus->id)->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $doneRecords / $totalRecords : 0;

        // Округляем до 2 знаков после запятой
        return round($ratio, 2);
    }

    public function calculate_unsuccessful($filtered_repairs): float
    {
        // Получаем общее количество отфильтрованных записей
        $totalRecords = $filtered_repairs->count();

        // Получаем статус "Неуспешный"
        $badStatus = OrderStatus::where('name', 'Неуспешный')->first();

        // Если статус "Неуспешный" не найден, устанавливаем count отменённых записей в 0
        $badRecords = 0;

        if ($badStatus) {
            // Получаем количество отфильтрованных записей со статусом "Неуспешный"
            $badRecords = $filtered_repairs->where('order_status_id', $badStatus->id)->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $badRecords / $totalRecords : 0;

        // Округляем до 2 знаков после запятой
        return round($ratio, 2);
    }

    public function calculate_done_before($filtered_repairs): float
    {
        // Получаем общее количество отфильтрованных записей
        $totalRecords = $filtered_repairs->count();

        // Получаем статус "Исполнен"
        $doneStatus = OrderStatus::where('name', 'Исполнен')->first();

        // Если статус "Исполнен" не найден, устанавливаем count выполненных в срок записей в 0
        $doneBeforeRecords = 0;

        if ($doneStatus) {
            // Получаем количество отфильтрованных записей со статусом "Исполнен" и дедлайном позже, чем updated_at
            $doneBeforeRecords = $filtered_repairs->filter(function ($repair) use ($doneStatus) {
                return $repair->order_status_id == $doneStatus->id && $repair->updated_at <= $repair->deadline;
            })->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $doneBeforeRecords / $totalRecords : 0;

        // Округляем до 2 знаков после запятой
        return round($ratio, 2);
    }

    public function calculate_done_after($filtered_repairs): float
    {
        // Получаем общее количество отфильтрованных записей
        $totalRecords = $filtered_repairs->count();

        // Получаем статус "Исполнен"
        $doneStatus = OrderStatus::where('name', 'Исполнен')->first();

        // Если статус "Исполнен" не найден, устанавливаем count выполненных в срок записей в 0
        $doneAfterRecords = 0;

        if ($doneStatus) {
            // Получаем количество отфильтрованных записей со статусом "Исполнен" и дедлайном позже, чем updated_at
            $doneAfterRecords = $filtered_repairs->filter(function ($repair) use ($doneStatus) {
                return $repair->order_status_id == $doneStatus->id && $repair->updated_at > $repair->deadline;
            })->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $doneAfterRecords / $totalRecords : 0;

        // Округляем до 2 знаков после запятой
        return round($ratio, 2);
    }

    public function calculate_cancelled($filtered_repairs): float
    {
        // Получаем общее количество отфильтрованных записей
        $totalRecords = $filtered_repairs->count();

        // Получаем статус "Отмененный"
        $cancelledStatus = OrderStatus::where('name', 'Отмененный')->first();

        // Если статус "Отмененный" не найден, устанавливаем count отменённых записей в 0
        $cancelledRecords = 0;

        if ($cancelledStatus) {
            // Получаем количество отфильтрованных записей со статусом "Отмененный"
            $cancelledRecords = $filtered_repairs->where('order_status_id', $cancelledStatus->id)->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $cancelledRecords / $totalRecords : 0;

        // Округляем до 2 знаков после запятой
        return round($ratio, 2);
    }

    public function create()
    {
        //
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "number" => ['nullable'],
            "price" => ['nullable'],
            "deadline"=> ['required'],
            "note" => ['nullable'],
            "turbine_id" => ['required'],
            "client_id" => ['required'],
            "order_status_id" => ['required'],
        ]);

        $number = $this->generateTurbineRepairNumber();

        TurbineRepair::create([
            ...$validated,
            "number" => $number,
            ]
        );

        return redirect()->back();
    }

    public function generateTurbineRepairNumber(): string
    {
        $date = now()->format('d.m.Y'); // Получаем текущую дату в формате ДД.ММ.ГГГГ

        // Получаем последний номер для текущей даты
        $lastTurbineRepair = TurbineRepair::where('number', 'like', "$date-%")
            ->orderBy('number', 'desc')
            ->first();

        if ($lastTurbineRepair) {
            // Извлекаем номер из последней записи
            $lastNumber = intval(substr($lastTurbineRepair->number, -3));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Форматируем номер с ведущими нулями
        $formattedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return "$date-$formattedNumber";
    }

    public function show(TurbineRepair $turbineRepair)
    {
        //
    }

    public function edit(TurbineRepair $turbineRepair)
    {
        //
    }

    public function update(Request $request, TurbineRepair $turbineRepair)
    {
        //
    }

    public function destroy(TurbineRepair $turbineRepair)
    {
        //
    }
}
