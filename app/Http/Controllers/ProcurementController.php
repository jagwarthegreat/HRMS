<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Stock;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProcurementController extends Controller
{
    public function index()
    {
        $procurements = Procurement::all();
        $procurement_data = array();
        $stocks = Stock::all();
        return Inertia::render('Procurement/Index', compact('procurements', 'procurement_data', 'stocks'));
    }

    public function store(Request $request)
    {
        $reference = "PUR-" . date("Ymdhis");
        $request->validate([
            "invoice" => ['required'],
            "date" => ['required'],
            "supplier" => ['required'],
            "remarks" => ['required'],
        ]);

        $procurement_data = Procurement::create([
            "reference" => $reference,
            "invoice" => $request->invoice,
            "date" => $request->date,
            "supplier" => $request->supplier,
            "remarks" => $request->remarks,
        ]);

        // $procurements = Procurement::all();
        // $stocks = Stock::all();
        // return Inertia::render('Procurement/Index', compact('procurements', 'procurement_data', 'stocks'));
        return redirect(route('procurement.show', $procurement_data->id));
    }

    public function show($procurement_id)
    {
        $procurement = Procurement::find($procurement_id);
        $stocks = Stock::all();
        return Inertia::render('Procurement/Show', compact('procurement', 'stocks'));
    }
}
