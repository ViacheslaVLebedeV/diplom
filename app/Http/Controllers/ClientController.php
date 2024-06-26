<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('clients.index', [
                "clients" => Client::query()->orderBy("lastname")->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            "lastname" => ['required'],
            "firstname" => ['required'],
            "middlename" => ['nullable'],
            "phone" => ['nullable'],
            "email" => ['nullable'],
            "note" => ['nullable'],
        ]);

        Client::create([
            ...$validated
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
