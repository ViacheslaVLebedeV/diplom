<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItem;
use App\Models\ReportPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportPurchaseController extends Controller
{
    public function index()
    {
        return view('purchases.report');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        //d(PurchaseItem::all());
        //$from = Str::replace('.', '-', Str::replace(',', '', $request->input('from')));

        //$to = Str::replace('.', '-', Str::replace(',', '', $request->input('to')));

        //$purchases = PurchaseItem::query()->whereBetween('updated_at', [$request->input('from'), $request->input('to')])->toSql();

        //dd($request->input('from'));
    }

    public function show(ReportPurchase $reportPurchase)
    {
        //
    }

    public function edit(ReportPurchase $reportPurchase)
    {
        //
    }

    public function update(Request $request, ReportPurchase $reportPurchase)
    {
        //
    }

    public function destroy(ReportPurchase $reportPurchase)
    {
        //
    }
}
