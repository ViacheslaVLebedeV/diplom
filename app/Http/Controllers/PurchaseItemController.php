<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Provider;
use App\Models\PurchaseItem;
use App\Models\PurchaseStatus;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;

class PurchaseItemController extends Controller
{
    public function index()
    {
        return view('purchases.index', [
                "purchases" => PurchaseItem::query()->orderBy("number")->get(),
                'details' => Detail::all(),
                'providers' => Provider::all(),
                'purchaseStatuses' => PurchaseStatus::all(),
            ]
        );
    }

    public function purchasePDF(Request $request)
    {
        // Получение данных из запроса
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $providerId = $request->input('provider_id');
        $purchaseStatusId = $request->input('purchase_status_id');

        // Преобразование дат в формат YYYY-MM-DD
        if ($startDate) {
            $startDate = Carbon::createFromFormat('d.m.Y', $startDate)->format('Y-m-d');
        }
        if ($endDate) {
            $endDate = Carbon::createFromFormat('d.m.Y', $endDate)->format('Y-m-d');
        }

        // Формирование запроса с фильтрацией
        $query = PurchaseItem::query();

        if ($startDate) {
            $query->whereRaw('DATE(created_at) >= ?', [$startDate]);
        }

        if ($endDate) {
            $query->whereRaw('DATE(created_at) <= ?', [$endDate]);
        }
        if ($providerId) {
            $query->where('provider_id', $providerId);
        }
        if ($purchaseStatusId) {
            $query->where('purchase_status_id', $purchaseStatusId);
        }

        $filtered_purchases = $query->get();

        $number = $this->generateReportNumber();
        $accepted = $this->calculate_accepted($filtered_purchases);
        $cancelled = $this->calculate_cancelled($filtered_purchases);
        $total_money = $this->calculate_money($filtered_purchases);

        $data = [
            'number' => $number,
            'accepted' => $accepted * 100,
            'cancelled' => $cancelled * 100,
            'total_money' => $total_money,
            'reportDate' => now()->format('d.m.y'),
            'purchases' => $filtered_purchases,
        ];

        $pdf = PDF::loadView('purchases.pdf', compact('data'))
        ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function calculate_money($filtered_purchases): float
    {
        $totalMoney = $filtered_purchases->sum(function ($purchaseItem) {
            return $purchaseItem->price * $purchaseItem->count;
        });

        return round($totalMoney, 2); // Округление до 2 знаков после запятой
    }

    public function generateReportNumber(): string
    {
        $date = now()->format('d.m.y'); // Получаем текущую дату в формате ДД.ММ.ГГ

        // Получаем ключ для хранения последнего номера за текущий день
        $cacheKey = "purchase_report_number_{$date}";

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

        return "$date-2-$formattedNumber";
    }

    public function calculate_accepted($filtered_purchases): float
    {
        // Получаем общее количество отфильтрованных записей
        $totalRecords = $filtered_purchases->count();

        // Получаем статус "Принята"
        $acceptedStatus = PurchaseStatus::where('name', 'Принята')->first();

        // Если статус "Принята" не найден, устанавливаем count принятых записей в 0
        $acceptedRecords = 0;

        if ($acceptedStatus) {
            // Получаем количество отфильтрованных записей со статусом "Принята"
            $acceptedRecords = $filtered_purchases->where('purchase_status_id', $acceptedStatus->id)->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $acceptedRecords / $totalRecords : 0;

        // Округляем до 2 знаков после запятой
        return round($ratio, 2);
    }

    public function calculate_cancelled($filtered_purchases): float
    {
        // Получаем общее количество отфильтрованных записей
        $totalRecords = $filtered_purchases->count();

        // Получаем статус "Отменена"
        $cancelledStatus = PurchaseStatus::where('name', 'Отменена')->first();

        // Если статус "Отменена" не найден, устанавливаем count отменённых записей в 0
        $cancelledRecords = 0;

        if ($cancelledStatus) {
            // Получаем количество отфильтрованных записей со статусом "Отменена"
            $cancelledRecords = $filtered_purchases->where('purchase_status_id', $cancelledStatus->id)->count();
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
            "price" => ['required', 'numeric'],
            "count" => ['required', 'integer'],
            "note" => ['nullable', 'string'],
            "detail_id" => ['required', 'exists:details,id'],
            "provider_id" => ['required', 'exists:providers,id'],
            "purchase_status_id" => ['required', 'exists:purchase_statuses,id'],
        ]);

        $number = $this->generatePurchaseNumber($validated['provider_id']);

        PurchaseItem::create([
            ...$validated,
            "number" => $number,
        ]);

        return redirect()->route('purchases.index');
    }

    public function generatePurchaseNumber($provider_id): string
    {
        $date = now()->format('d.m.y'); // Получаем текущую дату в формате ДД.ММ.ГГ

        // Получаем уникальный номер поставщика (ПП)
        $provider = Provider::find($provider_id);
        if (!$provider) {
            throw new Exception('Provider not found');
        }
        $providerNumber = str_pad($provider->sku, 2, '0', STR_PAD_LEFT);

        // Получаем последний номер для текущей даты и поставщика
        $prefix = "$date-$providerNumber";
        $lastPurchase = PurchaseItem::where('number', 'like', "$prefix-%")
            ->orderBy('number', 'desc')
            ->first();

        if ($lastPurchase) {
            // Извлекаем номер из последней записи
            $lastNumber = intval(substr($lastPurchase->number, -3));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Форматируем номер с ведущими нулями
        $formattedNumber = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return "$date-$providerNumber-$formattedNumber";
    }

    public function show(PurchaseItem $purchaseItem)
    {
        //
    }

    public function edit(PurchaseItem $purchaseItem)
    {
        //
    }

    public function update(Request $request, PurchaseItem $purchaseItem)
    {
        //
    }

    public function destroy(PurchaseItem $purchaseItem)
    {
        //
    }
}
