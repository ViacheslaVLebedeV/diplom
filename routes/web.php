<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PartRepairController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\TurbineRepairController;
use App\Models\Manufacturer;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurbineController;
use Illuminate\Support\Facades\App;


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
Route::resource("clients", ClientController::class);
Route::resource("turbines", TurbineController::class);
Route::resource("details", DetailController::class);
Route::resource("purchases", PurchaseItemController::class);
Route::resource("manufacturers", ManufacturerController::class);
Route::resource("order-statuses", OrderStatusController::class);
Route::resource("part-repairs", PartRepairController::class);
Route::resource("turbine-repairs", TurbineRepairController::class);


// Словари
Route::view("dictonaries", "dictonaries", [
    "order_statuses" => OrderStatus::simplePaginate(5),
    "manufacturers" => Manufacturer::all()
])->name("dictonaries");
