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


Route::redirect('/', 'dashboard')->middleware(['auth']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::view('ui', 'ui');

// ресурсы для работы контроллеров всех начальных ссылок
Route::resource("clients", ClientController::class)->middleware(['auth']);
Route::resource("turbines", TurbineController::class)->middleware(['auth']);
Route::resource("details", DetailController::class)->middleware(['auth']);
Route::resource("detail-types", DetailTypeController::class)->middleware(['auth']);
Route::resource("purchases", PurchaseItemController::class)->middleware(['auth']);
Route::resource("manufacturers", ManufacturerController::class)->middleware(['auth']);
Route::resource("providers", ProviderController::class)->middleware(['auth']);
Route::resource("order-statuses", OrderStatusController::class)->middleware(['auth']);
Route::resource("purchase-statuses", PurchaseStatusController::class)->middleware(['auth']);
Route::resource("part-repairs", PartRepairController::class)->middleware(['auth']);
Route::resource("turbine-repairs", TurbineRepairController::class)->middleware(['auth']);
Route::resource("detail-turbines", DetailTurbineController::class)->middleware(['auth']);
Route::resource("purchase-reports", \App\Http\Controllers\ReportPurchaseController::class)->middleware(['auth']);



// ДЕТАЛИ:
// Запрос цены детали у поставщика
Route::view("get-price", "details.get-price")
    ->name("details.get-price")->middleware(['auth']);
// Добавление связи с турбиной
Route::view("add-to-turbine", "details.add-to-turbine")
    ->name("details.add-to-turbine")->middleware(['auth']);



// ОТЧЁТНОСТЬ:
Route::view("turbine-report", "turbine-repairs.report")->name("turbine-repairs.report")->middleware(['auth']);
Route::view("part-report", "part-repairs.report")->name("part-repairs.report")->middleware(['auth']);
//Route::view("purchase-report", "purchases.report")->name("purchases.report")->middleware(['auth']);



// СЛОВАРИ:
Route::view("dict", "dictionaries.main")->name("dictionaries.main")->middleware(['auth']);

Route::view("dict/providers", "dictionaries.providers", [
    "providers" => Provider::all()
])->name("dictionaries.providers")->middleware(['auth']);
Route::view("dict/manufacturers", "dictionaries.manufacturers", [
    "manufacturers" => Manufacturer::all()
])->name("dictionaries.manufacturers")->middleware(['auth']);
Route::view("dict/order-statuses", "dictionaries.order-statuses", [
    "order_statuses" => OrderStatus::simplePaginate(5)
])->name("dictionaries.order-statuses")->middleware(['auth']);
Route::view("dict/purchase-statuses", "dictionaries.purchase-statuses", [
    "purchase_statuses" => PurchaseStatus::all(),
])->name("dictionaries.purchase-statuses")->middleware(['auth']);
Route::view("dict/detail-types", "dictionaries.detail-types", [
    "detail_types" => DetailType::all()
])->name("dictionaries.detail-types")->middleware(['auth']);
