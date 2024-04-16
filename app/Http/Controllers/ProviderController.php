<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return view('providers.index', [
//                "providers" => Provider::query()->orderBy("name")->get()
//            ]
//        );
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
            "name" => ['required'],
            "sku" => ['required'],
            "note" => ['nullable']
        ]);

        Provider::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->back();
    }
}
