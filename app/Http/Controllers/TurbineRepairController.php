<?php

namespace App\Http\Controllers;

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
