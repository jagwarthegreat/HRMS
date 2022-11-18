<?php

namespace App\Http\Controllers;

use App\Models\EmployeeEducationalBackground;
use Illuminate\Http\Request;

class EmployeeEducationalBackgroundController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "school_name" => ['required'],
            "completion_date" => ['required'],
        ]);

        $res = EmployeeEducationalBackground::create([
            "employee_id" => $request->employee_id,
            "schoolName" => $request->school_name,
            "degree" => $request->degree,
            "field" => $request->fieldOfStudy,
            "year" => $request->completion_date,
        ]);

        return redirect('employee/' . $request->employee_id);
    }

    public function destroy(Request $request, $id)
    {
        EmployeeEducationalBackground::find($id)->delete();

        return redirect()->route('employee.show', $request->employee_id);
    }
}
