<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Provider;
use App\Models\PurchaseItem;
use App\Models\PurchaseStatus;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function viewPDF()
    {
        $number = $this->generateReportNumber();
        $accepted = $this->calculate_accepted();
        $cancelled = $this->calculate_cancelled();
        $total_money = $this->calculate_money();

        $data = [
            'number' => $number,
            'accepted' => $accepted,
            'cancelled' => $cancelled,
            'total_money' => $total_money,
            'reportDate' => now()->format('d.m.y'),
            'purchases' => PurchaseItem::all(),
        ];

        $pdf = PDF::loadView('purchases.pdf', compact('data'));

        return $pdf->stream();
    }

    public function calculate_money(): float
    {
        $totalMoney = PurchaseItem::all()->sum(function ($purchaseItem) {
            return $purchaseItem->price * $purchaseItem->count;
        });

        return round($totalMoney, 2); // Округление до 2 знаков после запятой
    }

    public function generateReportNumber(): string
    {
        $date = now()->format('d.m.y'); // Получаем текущую дату в формате ДД.ММ.ГГ

        // Получаем ключ для хранения последнего номера за текущий день
        $cacheKey = "turbine_repair_number_{$date}";

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

    public function calculate_accepted(): float
    {
        // Получаем общее количество записей
        $totalRecords = PurchaseItem::count();

        // Получаем статус "Принята"
        $acceptedStatus = PurchaseStatus::where('name', 'Принята')->first();

        // Если статус "Принята" не найден, устанавливаем count принятых записей в 0
        $acceptedRecords = 0;

        if ($acceptedStatus) {
            // Получаем количество записей со статусом "Принята"
            $acceptedRecords = PurchaseItem::where('purchase_status_id', $acceptedStatus->id)->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $acceptedRecords / $totalRecords: 0;

        // Округляем до 2 знаков после запятой
        return round($ratio, 2);
    }

    public function calculate_cancelled(): float
    {
        // Получаем общее количество записей
        $totalRecords = PurchaseItem::count();

        // Получаем статус "Отменена"
        $cancelledStatus = PurchaseStatus::where('name', 'Отменена')->first();

        // Если статус "Отменена" не найден, устанавливаем count принятых записей в 0
        $cancelledRecords = 0;

        if ($cancelledStatus) {
            // Получаем количество записей со статусом "Отменена"
            $cancelledRecords = PurchaseItem::where('purchase_status_id', $cancelledStatus->id)->count();
        }

        // Вычисляем результат деления меньшего числа на большее
        $ratio = $totalRecords > 0 ? $cancelledRecords / $totalRecords: 0;

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
