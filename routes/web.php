<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::view('test', 'ui');
Route::view('turbine', 'turbine')->name('turbine');
Route::view('detail', 'detail')->name('detail');



Route::resource("turbines", \App\Http\Controllers\TurbineController::class);
Route::resource("manufacturers", \App\Http\Controllers\ManufacturerController::class);


