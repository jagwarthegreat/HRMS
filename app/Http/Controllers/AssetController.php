<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with('asset_category')->get();
       // dd($assets);
        return Inertia::render('Asset/Index',compact('assets'));
    }

    public function create()
    {
        $asset_categories = AssetCategory::all();
        return Inertia::render('Asset/Create',compact('asset_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "unit" => ['required'],
            "asset_category_id" => ['required'],
        ]);

        $client = Asset::create([
            "name" => $request->name,
            "unit" => $request->unit,
            "asset_category_id" => $request->asset_category_id,
        ]);

        return redirect('asset');
    }
}
