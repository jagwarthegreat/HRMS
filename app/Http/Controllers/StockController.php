<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('stock_category')->get();
        $categories = StockCategory::all();
        return Inertia::render('Stock/Index',compact('stocks','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "unit" => ['required'],
            "stock_category_id" => ['required'],
        ]);

        $client = Stock::create([
            "name" => $request->name,
            "unit" => $request->unit,
            "stock_category_id" => $request->stock_category_id,
        ]);

        return redirect('stock');
    }
}
