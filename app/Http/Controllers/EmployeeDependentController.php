<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDependent;
use Illuminate\Http\Request;

class EmployeeDependentController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            "dependent_name" => ['required'],
            "dependent_relationship" => ['required'],
            "dependent_contact" => ['required'],
        ]);

        $res = EmployeeDependent::create([
            "employee_id" => $request->employee_id,
            "fullname" => $request->dependent_name,
            "relationship" => $request->dependent_relationship,
            "contact" => $request->dependent_contact,
            "dob" => $request->dependent_dob,
        ]);

        return redirect('employee/' . $request->employee_id);
    }

    public function destroy(Request $request, $id)
    {
        EmployeeDependent::find($id)->delete();

        return redirect()->route('employee.show', $request->employee_id);
    }
}
