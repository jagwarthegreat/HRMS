<?php

namespace App\Http\Controllers;

use App\Models\EmpCompensationHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpCompensationHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trans_date' => 'required',
            'pay_rate' => 'required',
            'pay_type' => 'required',
        ]);

        EmpCompensationHistory::where('employee_id', $request->employee_id)->update([
            'status' => 0,
        ]);

        EmpCompensationHistory::create([
            'employee_id' => $request->employee_id,
            'pay_type_id' => $request->pay_type,
            'pay_rate' => $request->pay_rate,
            'reason' => $request->reason,
            'comment' => $request->comment,
            'trans_date' => $request->trans_date,
            'status' => 1,
        ]);

        return Inertia::location(route('employee.show', $request->employee_id));
    }
}
