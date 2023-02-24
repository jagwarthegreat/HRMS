<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockTransaction;
use App\Models\StockTransfer;
use App\Models\StockTransferDetail;
use App\Models\Location;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\DB;

class StockTransferController extends Controller
{
	public function index()
    {
        abort_if(
            Gate::denies('stock_transfer_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $stock_transfers = StockTransfer::with('location_from','location_to')->get();
        $locations = Location::all();
        return Inertia::render('Stock/Transfer/Index', compact('stock_transfers','locations'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('stock_transfer_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $reference = "ST-" . date("Ymdhis");
        $request->validate([
            "from" => ['required'],
            "to" => ['required','different:from'],
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
        abort_if(
            Gate::denies('stock_transfer_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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

    public function finish(Request $request){
        abort_if(
            Gate::denies('stock_transfer_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        StockTransfer::where('id', $request->stock_transfer_id)->update([
            "status" => 1
        ]);
        return redirect(route('stock.transfer.show', $request->stock_transfer_id));
    }

    public function destroy($id){
        abort_if(
            Gate::denies('stock_transfer_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        StockTransfer::find($id)->delete();

        return redirect()->route('stock.transfer');
    }
}
