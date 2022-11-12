<?php

namespace App\Http\Controllers;

use App\Models\EmpStatusHistory;
use Illuminate\Http\Request;

class EmpStatusHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trans_date' => 'required',
            'employee_status' => 'required',
        ]);

        $role = EmpStatusHistory::create([
            'employee_id' => $request->employee_id,
            'employee_status_id' => $request->employee_status,
            'comment' => $request->comment,
            'trans_date' => $request->trans_date,
        ]);

        return redirect('employee/' . $request->employee_id);
    }
}
