<?php

namespace App\Http\Controllers;

use App\Models\EmpStatusHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpStatusHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trans_date' => 'required',
            'employee_status' => 'required',
        ]);

        EmpStatusHistory::where('employee_id', $request->employee_id)->update([
            'status' => 0,
        ]);

        $role = EmpStatusHistory::create([
            'employee_id' => $request->employee_id,
            'employee_status_id' => $request->employee_status,
            'comment' => $request->comment,
            'trans_date' => $request->trans_date,
            'status' => 1,
        ]);

        return Inertia::location(route('employee.show', $request->employee_id));
    }
}
