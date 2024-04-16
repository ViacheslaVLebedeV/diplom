<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DetailTurbineController;
use App\Http\Controllers\DetailTypeController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\PartRepairController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\PurchaseStatusController;
use App\Http\Controllers\TurbineRepairController;
use App\Models\DetailType;
use App\Models\Manufacturer;
use App\Models\OrderStatus;
use App\Models\Provider;
use App\Models\PurchaseStatus;
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
Route::resource("detail-types", DetailTypeController::class);
Route::resource("purchases", PurchaseItemController::class);
Route::resource("manufacturers", ManufacturerController::class);
Route::resource("providers", ProviderController::class);
Route::resource("order-statuses", OrderStatusController::class);
Route::resource("purchase-statuses", PurchaseStatusController::class);
Route::resource("part-repairs", PartRepairController::class);
Route::resource("turbine-repairs", TurbineRepairController::class);
Route::resource("detail-turbines", DetailTurbineController::class);



// ДЕТАЛИ:
// Запрос цены детали у поставщика
Route::view("get-price", "details.get-price")
    ->name("details.get-price");
// Добавление связи с турбиной
Route::view("add-to-turbine", "details.add-to-turbine")
    ->name("details.add-to-turbine");



// ОТЧЁТНОСТЬ:
Route::view("turbine-report", "turbine-repairs.report")->name("turbine-repairs.report");
Route::view("part-report", "part-repairs.report")->name("part-repairs.report");
Route::view("purchase-report", "purchases.report")->name("purchases.report");



// СЛОВАРИ:
Route::view("dict", "dictionaries.main")->name("dictionaries.main");

Route::view("dict/providers", "dictionaries.providers", [
    "providers" => Provider::all()
])->name("dictionaries.providers");
Route::view("dict/manufacturers", "dictionaries.manufacturers", [
    "manufacturers" => Manufacturer::all()
])->name("dictionaries.manufacturers");
Route::view("dict/order-statuses", "dictionaries.order-statuses", [
    "order_statuses" => OrderStatus::simplePaginate(5)
])->name("dictionaries.order-statuses");
Route::view("dict/purchase-statuses", "dictionaries.purchase-statuses", [
    "purchase_statuses" => PurchaseStatus::all(),
])->name("dictionaries.purchase-statuses");
Route::view("dict/detail-types", "dictionaries.detail-types", [
    "detail_types" => DetailType::all()
])->name("dictionaries.detail-types");
