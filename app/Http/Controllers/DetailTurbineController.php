<?php

namespace App\Http\Controllers;

use App\Models\DetailTurbine;
use App\Models\Turbine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DetailTurbineController extends Controller
{
    public function index()
    {
        return view ('detail-turbines.index', [
                "turbines" => Turbine::all()
            ]
        );
    }

    public function store(Request $request):RedirectResponse
    {

        $turbine = Turbine::find($request->input("turbine_id"));
        $turbine->details()->attach($request->input("detail_id"));

        return redirect()->back();
    }

}
