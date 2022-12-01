<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockTransaction;
use App\Models\StockTransfer;
use App\Models\StockTransferDetail;
use App\Models\Location;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\DB;

class StockTransferController extends Controller
{
	public function index()
    {
        $stock_transfers = StockTransfer::with('location_from','location_to')->get();
        $locations = Location::all();
        return Inertia::render('Stock/Transfer/Index', compact('stock_transfers','locations'));
    }

    public function store(Request $request)
    {
        $reference = "ST-" . date("Ymdhis");
        $request->validate([
            "from" => ['required'],
            "to" => ['required'],
            "date" => ['required'],
            "remarks" => ['required'],
        ]);

        $procurement_data = StockTransfer::create([
            "reference" => $reference,
            "from" => $request->from,
            "to" => $request->to,
            "date" => $request->date,
            "remarks" => $request->remarks,
        ]);
        return redirect(route('stock.transfer.show', $procurement_data->id));
    }

    public function show($stock_transfer_id)
    {
        $stock_transfer = StockTransfer::with('location_from','location_to')->find($stock_transfer_id);

        $stocks = StockTransaction::selectRaw("SUM(IF(transaction = 'IN', quantity, -quantity)) as `quantity`,stock_id")
        ->where("location_id",$stock_transfer->from)
        ->where("status", 1)
        ->groupBy("stock_id")
        ->with('stock')
        ->get();

        $details = StockTransferDetail::where('stock_transfer_id',$stock_transfer_id)->with('stock')->get();
        return Inertia::render('Stock/Transfer/Show', compact('stock_transfer', 'stocks','details'));
    }

}
