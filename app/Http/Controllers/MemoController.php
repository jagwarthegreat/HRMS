<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class MemoController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('memo_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $memos = Memo::with([
            'employee'
        ])->get();

        $employees = Employee::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Memo/Index', compact('memos', 'employees', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('memo_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        // htmlentities(str_replace("'", "&#x2019;", $v));

        $request->validate([
            'employee_id' => 'required',
            'from' => 'required',
            'memo_date' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        Memo::create([
            'employee_id' => $request->employee_id[0]['value'],
            'from' => $request->from,
            'memo_date' => $request->memo_date,
            'subject' => $request->subject,
            'content' => htmlentities(str_replace("'", "&#x2019;", $request->content))
        ]);

        return redirect()->route('memo');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('memo_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        Memo::find($id)->delete();

        return redirect()->route('memo');
    }

    public function show($id)
    {
        abort_if(
            Gate::denies('memo_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $memo = Memo::where("id", $id)
            ->with([
                'employee'
            ])->first();

        // dd($memo);

        $canCreate = Gate::allows('position_create');

        return Inertia::render('Memo/details', compact('memo', 'canCreate'));
    }
}
