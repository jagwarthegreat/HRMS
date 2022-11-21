<?php

namespace App\Http\Controllers;

use App\Models\EmpTypeHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpTypeHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trans_date' => 'required',
            'employment_type' => 'required',
        ]);

        EmpTypeHistory::where('employee_id', $request->employee_id)->update([
            'status' => 0,
        ]);

        $role = EmpTypeHistory::create([
            'employee_id' => $request->employee_id,
            'employee_type_id' => $request->employment_type,
            'comment' => $request->comment,
            'trans_date' => $request->trans_date,
            'status' => 1,
        ]);

        return Inertia::location(route('employee.show', $request->employee_id));
    }
}
