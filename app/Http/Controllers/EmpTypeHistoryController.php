<?php

namespace App\Http\Controllers;

use App\Models\EmpTypeHistory;
use Illuminate\Http\Request;

class EmpTypeHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'trans_date' => 'required',
            'employment_type' => 'required',
        ]);

        $role = EmpTypeHistory::create([
            'employee_id' => $request->employee_id,
            'employee_type_id' => $request->employment_type,
            'comment' => $request->comment,
            'trans_date' => $request->trans_date,
        ]);

        return redirect('employee/' . $request->employee_id);
    }
}
