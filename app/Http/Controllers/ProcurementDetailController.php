<?php

namespace App\Http\Controllers;

use App\Models\ProcurementDetail;
use Illuminate\Http\Request;

class ProcurementDetailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "stock_id" => ['required'],
            "quantity" => ['required'],
            "cost" => ['required'],
            "amount" => ['required'],
        ]);

        $procurement_data = ProcurementDetail::create([
            "stock_id" => $request->stock_id,
            "quantity" => $request->quantity,
            "cost" => $request->cost,
            "amount" => $request->amount,
        ]);

        // $procurements = Procurement::all();
        // $stocks = Stock::all();
        // return Inertia::render('Procurement/Index', compact('procurements', 'procurement_data', 'stocks'));
        return redirect(route('procurement.show', $request->procurement_id));
    }
}
