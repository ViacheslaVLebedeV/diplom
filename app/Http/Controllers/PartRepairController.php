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

        $number = $this->generateOrderNumber(3, 4);

        PartRepair::create([
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

    public function show(PartRepair $partRepair)
    {
        //
    }

    public function edit(PartRepair $partRepair)
    {
        //
    }

    public function update(Request $request, PartRepair $partRepair)
    {
        //
    }

    public function destroy(PartRepair $partRepair)
    {
        //
    }
}
