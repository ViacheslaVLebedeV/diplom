<?php

namespace App\Http\Controllers;

use App\Models\PurchaseStatus;
use Illuminate\Http\Request;

class PurchaseStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            "name" => ['required']
        ]);

        PurchaseStatus::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseStatus $purchaseStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseStatus $purchaseStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseStatus $purchaseStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseStatus $purchaseStatus)
    {
        $purchaseStatus->delete();
        return redirect()->back();
    }
}
