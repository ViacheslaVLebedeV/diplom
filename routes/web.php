<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\PurchaseItemController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TurbineController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::view('ui', 'ui');

// ресурсы для работы контроллеров всех начальных ссылок
Route::resource("clients", ClientController::class)
    ->only('index', 'store', 'create');
Route::resource("turbines", TurbineController::class)
    ->only('index', 'store', 'create');
Route::resource("details", DetailController::class)
    ->only('index', 'store', 'create');
Route::resource("purchases", PurchaseItemController::class)
    ->only('index', 'store', 'create');


Route::resource("manufacturers", ManufacturerController::class);


