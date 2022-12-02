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
            "quantity" => ['required', 'lte:avail_quantity'],
        ]);

        $count_existing_stocks = StockTransferDetail::where('stock_transfer_id',$request->stock_transfer_id)
        ->where('stock_id',$request->stock_id)
        ->count();

        if($count_existing_stocks < 1){
            $procurement_data = StockTransferDetail::create([
                "stock_transfer_id" => $request->stock_transfer_id,
                "stock_id" => $request->stock_id,
                "quantity" => $request->quantity,
            ]);
        }
        return redirect(route('stock.transfer.show', $request->stock_transfer_id));
    }
}
