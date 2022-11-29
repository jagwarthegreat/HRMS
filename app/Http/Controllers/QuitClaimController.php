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

        $qclaims = QuitClaim::all();
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

        // htmlentities(str_replace("'", "&#x2019;", $v));

        $request->validate([
            'to' => 'required',
            'from' => 'required',
            'memo_date' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        QuitClaim::create([
            'to' => $request->to,
            'from' => $request->from,
            'memo_date' => $request->memo_date,
            'subject' => $request->subject,
            'content' => htmlentities(str_replace("'", "&#x2019;", $request->content))
        ]);

        return redirect()->route('memo');
    }

    public function destroy(Request $request, $id)
    {
        QuitClaim::find($id)->delete();

        return redirect()->route('memo');
    }
}
