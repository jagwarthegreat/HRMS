<?php

namespace App\Http\Controllers;

use App\Models\StockCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StockCategoryController extends Controller
{
    public function index()
    {
        $categories = StockCategory::all();
        return Inertia::render('Stock/Category/Index',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
        ]);

        $client = StockCategory::create([
            "name" => $request->name,
        ]);

        return redirect('stock/category');
    }
}
