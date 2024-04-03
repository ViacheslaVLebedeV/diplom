<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailRequest;
use App\Models\Detail;
use App\Models\Manufacturer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('details.index', [
            "details" => Detail::query()->orderBy("number")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view ('details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request);
        $validated = $request->validate([
            "number" => ['required'],
            "description" => ['required'],
            "manufacturer_id" => ['required'],
            "detail_type_id" => ['required'],
        ]);

       Detail::create([
           ...$validated,
           "description" => Crypt::encryptString($validated["description"]),
           "count" => 0,
       ]);
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        //
    }
}
