<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;
use App\Models\EmployeeDependent;
use App\Models\EmployeeStatus;
use App\Models\EmployeeType;
use App\Models\Location;
use App\Models\PayType;
use App\Models\Position;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('id', '>', '0')->get();

        return Inertia::render('Employee/Index', compact('employees'));
    }

    public function create()
    {
        $employeeTypes = EmployeeType::all();
        $employee_status = EmployeeStatus::all();
        $departments =  Department::all();
        $positions =  Position::all();
        $locations =  Location::all();
        $employees =  Employee::all();
        $paytypes =  PayType::all();
        return Inertia::render('Employee/Create', compact('employeeTypes', 'employee_status', 'departments', 'positions', 'locations', 'employees', 'paytypes'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $emp_code = "EMP" . date('Ymdhis');
        $request->validate([
            "firstname" => ['required'],
            "middlename" => ['required'],
            "lastname" => ['required'],
            "contact" => ['required'],
            "email" => ['required', 'email'],
            "address" => ['required'],
            "dob" => ['required'],
            "gender" => ['required'],
            "civil_status" => ['required'],
        ]);

        // "firstname",
        // "middlename",
        // "lastname",
        // "contact",
        // "email",
        // "address",
        // "dob",
        // "gender",
        // "civil_status",
        // "sss",
        // "tin",
        // "pagibig",
        // "philhealth",
        // "employeeType",
        // "employeeStatus",
        // "doh",
        // "ced",
        // "department",
        // "jobTitle",
        // "location",
        // "reportingTo",
        // "payRate",
        // "payType"

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
            "date_of_hire" => $request->doh,
            "contract_end_date" => $request->ced,
        ]);

        return redirect('employee');
    }

    public function show($employee_id)
    {
        $employee = Employee::with([
            'dependents',
            'work_experiences',
            'educ_backgrounds',
            'emp_status_histories.employee_statuses',
            'emp_type_histories.employee_types',
            'emp_compensation_histories.pay_types',
            'emp_job_histories'
        ])->find($employee_id);

        // dd($employee);

        return Inertia::render('Employee/Profile/Index', compact('employee'));
    }

    public function employementTypeHistory($request)
    {
        EmployeeType::create([]);
    }
}
