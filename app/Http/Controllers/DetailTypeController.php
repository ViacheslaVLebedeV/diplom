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
        return "Detail index page";
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
        return "Detail store request";
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
        return "Detail delete request";
    }
}
