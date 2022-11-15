<?php

namespace App\Http\Controllers;

use App\Models\EmpJobHistory;
use Illuminate\Http\Request;

class EmpJobHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'department' => 'required',
            'position' => 'required',
        ]);

        EmpJobHistory::create([
            'employee_id' => $request->employee_id,
            'location_id' => $request->location,
            'department_id' => $request->department,
            'position_id' => $request->position,
            'trans_date' => $request->trans_date,
        ]);

        return redirect('employee/' . $request->employee_id);
    }
}
