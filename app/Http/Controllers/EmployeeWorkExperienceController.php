<?php

namespace App\Http\Controllers;

use App\Models\EmployeeWorkExperience;
use Illuminate\Http\Request;

class EmployeeWorkExperienceController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            "prev_company" => ['required'],
            "jobTitle" => ['required'],
        ]);

        $res = EmployeeWorkExperience::create([
            "employee_id" => $request->employee_id,
            "companyName" => $request->prev_company,
            "jobtitle" => $request->jobTitle,
            "from" => $request->from_date,
            "to" => $request->to_date,
            "job_desc" => $request->job_desc,
        ]);

        // echo ($res) ? 1 : 0;
        // return response()->json($res);
    }
}
