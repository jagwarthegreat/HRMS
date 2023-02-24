<?php

namespace App\Http\Controllers;

use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StockTransactionController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('inventory_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        $stocks = StockTransaction::selectRaw("SUM(IF(transaction = 'IN', quantity, -quantity)) as `quantity`,stock_id")
            ->where("location_id", 1)
            ->where("status", 1)
            ->groupBy("stock_id")
            ->with('stock')
            ->get();
        $date_now = date("F d, Y");
        return Inertia::render("Report/Inventory/Index", compact('stocks', 'date_now'));
    }
}
