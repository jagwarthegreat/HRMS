<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProcurementController extends Controller
{
	public function index()
    {
        $procurements = Procurement::all();
        return Inertia::render('Procurement/Index',compact('procurements'));
    }

    public function store(Request $request)
    {
    	$reference = "PUR-".date("Ymdhis");
        $request->validate([
            "invoice" => ['required'],
            "date" => ['required'],
            "supplier" => ['required'],
        ]);

        $client = Procurement::create([
            "reference" => $reference,
            "invoice" => $request->invoice,
            "date" => $request->date,
            "supplier" => $request->supplier,
            "remarks" => $request->remarks,
        ]);

        return redirect('procurement');
    }
}
