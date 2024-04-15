<?php

namespace App\Http\Controllers;

use App\Models\PartRepair;
use Illuminate\Http\Request;

class PartRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('part-repairs.index', [
                "part_repairs" => PartRepair::query()->orderBy("number")->get()
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
            'number' => ['nullable'],
            'price' => ['required'],
            'deadline' => ['required'],
            'note' => ['nullable'],
            'detail_id' => ['required'],
            'client_id' => ['required'],
            'order_status_id' => ['required'],
        ]);

        PartRepair::create([
            ...$validated,
            "number" => "1"
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(PartRepair $partRepair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartRepair $partRepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartRepair $partRepair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartRepair $partRepair)
    {
        //
    }
}
