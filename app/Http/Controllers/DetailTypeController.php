<?php

namespace App\Http\Controllers;

use App\Models\DetailType;
use Illuminate\Http\Request;

class DetailTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailTypes = DetailType::all()->pluck('name', 'id');

        return response()->json($detailTypes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Detail create page";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ['required'],
            "note" => ['nullable']
        ]);

        DetailType::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailType $detailType)
    {
        return "Detail show one page";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailType $detailType)
    {
        return "Detail edit page";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailType $detailType)
    {
        return "Detail update request";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailType $detailType)
    {
        $detailType->delete();
        return redirect()->back();
    }
}
