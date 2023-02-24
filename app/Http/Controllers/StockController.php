<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StockController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('stocks_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $stocks = Stock::with('stock_category')->get();
        $categories = StockCategory::all();
        return Inertia::render('Stock/Index',compact('stocks','categories'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('stocks_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        $request->validate([
            "name" => ['required'],
            "unit" => ['required'],
            "stock_category_id" => ['required'],
        ]);

        if($request->stock_id == ''){
            Stock::create([
                "name" => $request->name,
                "unit" => $request->unit,
                "stock_category_id" => $request->stock_category_id,
            ]);
        }else{
            Stock::where('id', $request->stock_id)->update([
                "name" => $request->name,
                "unit" => $request->unit,
                "stock_category_id" => $request->stock_category_id,
            ]);
        }

        return redirect('stock');
    }
}
