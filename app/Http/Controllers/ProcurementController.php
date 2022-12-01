<?php

namespace App\Http\Controllers;

use App\Models\ProcurementDetail;
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
        $location_id = 1;
        $request->validate([
            "invoice" => ['required'],
            "date" => ['required'],
            "supplier" => ['required'],
            "remarks" => ['required'],
        ]);

        $procurement_data = Procurement::create([
            "location_id" => $location_id,
            "reference" => $reference,
            "invoice" => $request->invoice,
            "date" => $request->date,
            "supplier" => $request->supplier,
            "remarks" => $request->remarks,
        ]);

        //echo $procurement_data;

        // $procurements = Procurement::all();
        // $stocks = Stock::all();
        // return Inertia::render('Procurement/Index', compact('procurements', 'procurement_data', 'stocks'));
        return redirect(route('procurement.show', $procurement_data->id));
    }

    public function show($procurement_id)
    {
        $procurement = Procurement::find($procurement_id);
        $stocks = Stock::all();
        $details = ProcurementDetail::where('procurement_id',$procurement_id)->with('stock')->get();
        return Inertia::render('Procurement/Show', compact('procurement', 'stocks','details'));
    }

    public function finish(Request $request){
        Procurement::where('id', $request->procurement_id)->update([
            "status" => 1
        ]);
        return redirect(route('procurement.show', $request->procurement_id));
    }
}
