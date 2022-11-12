<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmpCompensationHistory;
use App\Models\EmpJobHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;
use App\Models\EmployeeDependent;
use App\Models\EmployeeStatus;
use App\Models\EmployeeType;
use App\Models\EmpStatusHistory;
use App\Models\EmpTypeHistory;
use App\Models\Location;
use App\Models\PayType;
use App\Models\Position;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with([
            'dependents',
            'work_experiences',
            'educ_backgrounds',
            'emp_status_histories.employee_statuses',
            'emp_type_histories.employee_types',
            'emp_compensation_histories.pay_types',
            'emp_job_histories.locations',
            'emp_job_histories.departments',
            'emp_job_histories.positions',
            'emp_job_histories.reportsto'
        ])->get();

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

        $employee = Employee::create([
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

        // insert to status history
        EmpStatusHistory::create([
            'employee_id' => $employee->id,
            'employee_status_id' => $request->employeeStatus,
            'comment' => "",
            'trans_date' => date('Y-m-d'),
        ]);

        // insert to type history
        EmpTypeHistory::create([
            'employee_id' => $employee->id,
            'employee_type_id' => $request->employeeType,
            'comment' => "",
            'trans_date' => date('Y-m-d'),
        ]);

        // insert to compensation history
        EmpCompensationHistory::create([
            'employee_id' => $employee->id,
            'pay_type_id' => $request->payType,
            'pay_rate' => "$request->payRate",
            'reason' => "",
            'comment' => "",
            'trans_date' => date('Y-m-d'),
        ]);

        // insert to job history
        EmpJobHistory::create([
            'employee_id' => $employee->id,
            'location_id' => $request->location,
            'department_id' => "$request->department",
            'position_id' => "$request->jobTitle",
            'reports_to' => "$request->reportingTo",
            'trans_date' => date('Y-m-d'),
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
            'emp_job_histories.locations',
            'emp_job_histories.departments',
            'emp_job_histories.positions',
            'emp_job_histories.reportsto'
        ])->find($employee_id);

        $employeeTypes = EmployeeType::all();
        $employee_status = EmployeeStatus::all();
        $departments =  Department::all();
        $positions =  Position::all();
        $locations =  Location::all();
        $paytypes =  PayType::all();
        $employees =  Employee::all();

        // dd($employee);

        return Inertia::render('Employee/Profile/Index', compact('employee', 'employeeTypes', 'employee_status', 'departments', 'positions', 'locations', 'paytypes', 'employees'));
    }
}
