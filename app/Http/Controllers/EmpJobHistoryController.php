<?php

namespace App\Http\Controllers;

use App\Models\EmpJobHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmpJobHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trans_date' => 'required',
            'location' => 'required',
            'department' => 'required',
            'position' => 'required',
        ]);

        EmpJobHistory::where('employee_id', $request->employee_id)->update([
            'status' => 0,
        ]);

        EmpJobHistory::create([
            'employee_id' => $request->employee_id,
            'location_id' => $request->location,
            'department_id' => $request->department,
            'position_id' => $request->position,
            'trans_date' => $request->trans_date,
            'status' => 1,
        ]);

        return Inertia::location(route('employee.show', $request->employee_id));
    }
}
