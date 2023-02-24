<?php

namespace App\Http\Controllers;

use App\Models\StockCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StockCategoryController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('stock_category_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $categories = StockCategory::all();
        return Inertia::render('Stock/Category/Index',compact('categories'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('stock_category_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        $request->validate([
            "name" => ['required'],
        ]);

        if($request->category_id == ''){
            StockCategory::create([
                'name' => $request->name
            ]);
        }else{
            StockCategory::where('id', $request->category_id)->update([
                'name' => $request->name
            ]);
        }
        
        return redirect('stock/category');
    }
}
