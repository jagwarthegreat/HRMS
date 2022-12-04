<?php

namespace App\Http\Controllers;

use App\Models\Lawsuit;
use App\Models\Settlement;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;

class SettlementController extends Controller
{
    public function index($lawsuit_id)
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $lawsuit = Lawsuit::where("id", $lawsuit_id)->first();
        $settlements = Settlement::where("lawsuit_id", $lawsuit_id)->get();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Settlement/Index', compact('lawsuit', 'settlements', 'canCreate'));
    }

    public function store(Request $request)
    {
        // abort_if(
        //     Gate::denies('position_create'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $request->validate([
            'settlement_date' => 'required',
            'content' => 'required',
        ]);

        Settlement::create([
            'lawsuit_id' => $request->lawsuit_id,
            'content' => htmlentities(str_replace("'", "&#x2019;", $request->content)),
            'date' => $request->settlement_date
        ]);

        return redirect()->route('lawsuit.settlement', $request->lawsuit_id);
    }

    public function destroy(Request $request, $id)
    {
        Settlement::find($id)->delete();

        return redirect()->route('lawsuit.settlement', $request->lawsuit_id);
    }
}
