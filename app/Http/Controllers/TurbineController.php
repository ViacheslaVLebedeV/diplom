<?php

namespace App\Http\Controllers;

use App\Models\Turbine;
use Illuminate\Http\Request;

class TurbineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("turbine", [
            'data' => Turbine::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Это страница создания";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Turbine $turbine)
    {
        return $turbine;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turbine $turbine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Turbine $turbine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turbine $turbine)
    {
        //
    }
}
