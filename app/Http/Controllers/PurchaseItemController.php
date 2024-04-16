<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchases.index', [
                "purchases" => PurchaseItem::query()->orderBy("number")->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "number" => ['nullable'],
            "price" => ['required'],
            "count"=> ['required'],
            "note" => ['nullable'],
            "detail_id" => ['required'],
            "provider_id" => ['required'],
            "purchase_status_id" => ['required'],
        ]);

        $number = $this->generatePurchaseNumber(5, 6);

        PurchaseItem::create([
                ...$validated,
                "number" => $number,
            ]
        );

        return redirect()->back();
    }

    public function generatePurchaseNumber($date, $id)
    {
        return $date + $id;
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseItem $purchaseItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseItem $purchaseItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseItem $purchaseItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseItem $purchaseItem)
    {
        //
    }
}
