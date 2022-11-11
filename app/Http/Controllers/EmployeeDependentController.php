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

        // echo ($res) ? 1 : 0;
        // return response()->json($res);
    }
}
