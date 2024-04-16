<?php

namespace App\Http\Controllers;

use App\Models\DetailTurbine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DetailTurbineController extends Controller
{
    public function index()
    {
        return view ('detail-turbines.index', [
            //"detail_turbines" => DetailTurbine::query()->orderBy("turbine_id")->get()
            ]
        );
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //dd($request);
        $validated = $request->validate([
            "detail_id" => ['required'],
            "turbine_id" => ['required'],
            "note" => ['nullable'],
        ]);

        DetailTurbine::create([
            ...$validated
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailTurbine $detailTurbine)
    {
        return $detailTurbine;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailTurbine $detailTurbine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailTurbine $detailTurbine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailTurbine $detailTurbine)
    {
        //
    }
}
