<?php

namespace App\Http\Controllers;

use App\Models\StockTransferDetail;
use Illuminate\Http\Request;

class StockTransferDetailController extends Controller
{
	public function store(Request $request)
    {
        $request->validate([
            "stock_id" => ['required'],
            "quantity" => ['required'],
        ]);

        $procurement_data = StockTransferDetail::create([
            "stock_transfer_id" => $request->stock_transfer_id,
            "stock_id" => $request->stock_id,
            "quantity" => $request->quantity,
        ]);

        // $procurements = Procurement::all();
        // $stocks = Stock::all();
        // return Inertia::render('Procurement/Index', compact('procurements', 'procurement_data', 'stocks'));
        return redirect(route('stock.transfer.show', $request->stock_transfer_id));
    }
}
