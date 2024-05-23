<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItem;
use App\Models\TurbineRepair;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TurbineRepairController extends Controller
{
    public function index()
    {
        return view('turbine-repairs.index', [
                "turbine_repairs" => TurbineRepair::query()->orderBy("number")->get()
            ]
        );
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
        $lastPurchase = TurbineRepair::where('number', 'like', "$date-%")
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
