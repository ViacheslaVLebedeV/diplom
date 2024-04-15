<?php

namespace App\Http\Controllers;

use App\Models\TurbineRepair;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TurbineRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('turbine-repairs.index', [
                "turbine_repairs" => TurbineRepair::query()->orderBy("number")->get()
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

        //dd($validated);

        $number = $this->generateOrderNumber(1, 2);

        TurbineRepair::create([
            ...$validated,
            "number" => $number,
            ]
        );

        return redirect()->back();
    }

    public function generateOrderNumber($date, $id)
    {
        return $date + $id;
    }

    /**
     * Display the specified resource.
     */
    public function show(TurbineRepair $turbineRepair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TurbineRepair $turbineRepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TurbineRepair $turbineRepair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TurbineRepair $turbineRepair)
    {
        //
    }


}
