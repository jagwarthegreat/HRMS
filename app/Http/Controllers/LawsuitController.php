<?php

namespace App\Http\Controllers;

use App\Models\Lawsuit;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LawsuitController extends Controller
{
    public function index()
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $lawsuits = Lawsuit::all();
        $employees = Employee::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Lawsuit/Index', compact('lawsuits', 'employees', 'canCreate'));
    }

    public function store(Request $request)
    {
        // abort_if(
        //     Gate::denies('position_create'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $request->validate([
            'complainant' => 'required',
            'respondent' => 'required',
            'case_date' => 'required',
            'case_name' => 'required',
            'status' => 'required',
            'content' => 'required',
        ]);

        Lawsuit::create([
            'case' => $request->case_name,
            'content' => htmlentities(str_replace("'", "&#x2019;", $request->content)),
            'complainant' => $request->complainant,
            'respondent' => $request->respondent,
            'case_date' => $request->case_date,
            'status' => $request->status
        ]);

        return redirect()->route('lawsuit');
    }

    public function destroy(Request $request, $id)
    {
        Lawsuit::find($id)->delete();

        return redirect()->route('lawsuit');
    }
}
