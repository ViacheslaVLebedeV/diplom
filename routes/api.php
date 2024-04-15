<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/details', function (Request $request) {
    return \App\Models\Detail::all();
});

Route::get('/details-by-number', function (Request $request) {

   // dd($request->input("search"));

    return \App\Models\Detail::when($request->input("search"), function  ($query) use ($request) {
        return $query->where("number", "like", "%".$request->input("search")."%");
    })->get();
});



