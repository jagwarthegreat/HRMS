<?php

namespace App\Http\Controllers;

use App\Models\EmpRequirement;
use Illuminate\Http\Request;

class EmpRequirementController extends Controller
{
    public function update(Request $request, $id)
    {
        if ($request->req_status == "insert") {
            EmpRequirement::create([
                'requirement_id' => $id,
                'employee_id' => $request->employee_id,
            ]);
        } else {
            EmpRequirement::where("requirement_id", $id)
                ->where("employee_id", $request->employee_id)
                ->delete();
        }

        return redirect()->route('employee.show', $request->employee_id);
    }
}
