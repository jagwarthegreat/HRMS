<?php

namespace App\Http\Controllers;

use App\Models\QuitClaim;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class QuitClaimController extends Controller
{
    public function index()
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $qclaims = QuitClaim::with(['employee'])->get();
        $employees = Employee::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Quitclaims/Index', compact('qclaims', 'employees', 'canCreate'));
    }

    public function store(Request $request)
    {
        // abort_if(
        //     Gate::denies('position_create'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $request->validate([
            'employee' => 'required',
            'amount' => 'required',
            'resignation_date' => 'required',
            'claims_date' => 'required',
        ]);

        QuitClaim::create([
            'employee_id' => $request->employee,
            'amount' => $request->amount,
            'resgnation_effective_date' => $request->resignation_date,
            'claims_effective_date' => $request->claims_date
        ]);

        return redirect()->route('quitclaims');
    }

    public function destroy(Request $request, $id)
    {
        QuitClaim::find($id)->delete();

        return redirect()->route('quitclaims');
    }

    public function show($id)
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $qclaim = QuitClaim::where("id", $id)
            ->with([
                'employee'
            ])->first();

        // dd($memo);

        $canCreate = Gate::allows('position_create');

        return Inertia::render('Quitclaims/qprint', compact('qclaim', 'canCreate'));
    }
}
