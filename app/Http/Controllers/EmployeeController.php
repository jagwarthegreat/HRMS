<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('id', '>', '0')->get();

        return Inertia::render('Employee/Index', compact('employees'));
    }

    public function create()
    {
        return Inertia::render('Employee/Create');
    }

    public function store(Request $request)
    {
        $emp_code = "EMP" . date('Ymdhis');
        $request->validate([
            "firstname" => ['required'],
            "middlename" => ['required'],
            "lastname" => ['required'],
            "email" => ['email'],
            "address" => ['required'],
            "dob" => ['required'],
            "gender" => ['required'],
            "civil_status" => ['required'],
            "sss" => ['required'],
            "tin" => ['required'],
            "pagibig" => ['required'],
            "philhealth" => ['required'],
        ]);

        Employee::create([
            "employee_code" => $emp_code,
            "firstname" => $request->firstname,
            "middlename" => $request->middlename,
            "lastname" => $request->lastname,
            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
            "date_of_birth" => $request->dob,
            "gender" => $request->gender,
            "civil_status" => $request->civil_status,
            "sss_number" => $request->sss,
            "tin_number" => $request->tin,
            "pagibig_number" => $request->pagibig,
            "philhealth_number" => $request->philhealth,
            "educ_elementary" => $request->elementary,
            "educ_elem_year" => $request->elem_year_graduated,
            "educ_highschool" => $request->highschool,
            "educ_hs_year" => $request->hs_year_graduated,
            "educ_college" => $request->college,
            "educ_college_year" => $request->college_year_graduated,
            "educ_college_degree" => $request->degree,
        ]);

        return redirect('employee');
    }

    public function show($employee_id)
    {
        $employee = Employee::find($employee_id);

        return Inertia::render('Employee/Show', compact('employee'));
    }
}
