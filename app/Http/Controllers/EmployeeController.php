<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Document;
use App\Models\DocumentCategory;
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
use App\Models\HiringRequirement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
            'emp_curr_work.locations',
            'emp_curr_work.departments',
            'emp_curr_work.positions',
            'emp_curr_type.employee_types',
            'emp_curr_status.employee_statuses',
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
            "email" => ['email'],
            "address" => ['required'],
            "dob" => ['required'],
            "gender" => ['required'],
            "civil_status" => ['required'],
        ]);

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
        if ($request->employeeStatus != "") {
            EmpStatusHistory::where('employee_id', $employee->id)->update([
                'status' => 0,
            ]);

            EmpStatusHistory::create([
                'employee_id' => $employee->id,
                'employee_status_id' => $request->employeeStatus,
                'comment' => "",
                'trans_date' => date('Y-m-d'),
                'status' => 1,
            ]);
        }

        // insert to type history
        if ($request->employeeType != "") {
            EmpTypeHistory::where('employee_id', $employee->id)->update([
                'status' => 0,
            ]);

            EmpTypeHistory::create([
                'employee_id' => $employee->id,
                'employee_type_id' => $request->employeeType,
                'comment' => "",
                'trans_date' => date('Y-m-d'),
                'status' => 1,
            ]);
        }

        // insert to compensation history
        if ($request->payType != "" && $request->payRate != "") {
            EmpCompensationHistory::where('employee_id', $employee->id)->update([
                'status' => 0,
            ]);

            EmpCompensationHistory::create([
                'employee_id' => $employee->id,
                'pay_type_id' => $request->payType,
                'pay_rate' => "$request->payRate",
                'reason' => "",
                'comment' => "",
                'trans_date' => date('Y-m-d'),
                'status' => 1,
            ]);
        }

        // insert to job history
        if ($request->location != "" && $request->department != "" && $request->jobTitle != "") {
            EmpJobHistory::where('employee_id', $employee->id)->update([
                'status' => 0,
            ]);

            EmpJobHistory::create([
                'employee_id' => $employee->id,
                'location_id' => $request->location,
                'department_id' => "$request->department",
                'position_id' => "$request->jobTitle",
                'trans_date' => date('Y-m-d'),
                'status' => 1
            ]);
        }

        return redirect('employee');
    }

    public function update(Request $request, $id)
    {
        // dd($request);

        $request->validate([
            "firstname" => ['required'],
            "middlename" => ['required'],
            "lastname" => ['required'],
            "contact" => ['required'],
            "email" => ['email'],
            "address" => ['required'],
            "dob" => ['required'],
            "gender" => ['required'],
            "civil_status" => ['required'],
        ]);

        $image_path = '';
        $doc = [];
        if ($request->hasFile('emp_avatar')) {
            $file = $request->file('emp_avatar');
            $filename = $file->getClientOriginalName();
            $filesize = $file->getSize();
            $fileType = $file->getClientOriginalExtension();

            $image_path = $request->file('emp_avatar')->store('employee', 'public');

            $employee = Employee::find($id);
            if ($employee->avatar_id != null) {
                $document = Document::find($employee->avatar_id);
                if (Storage::disk('public')->exists($document->slug)) {
                    Storage::disk('public')->delete($document->slug);
                    $document->delete();
                }
            }

            $doc = Document::create([
                'employee_id' => $id,
                'filename' => $filename,
                'filetype' => $fileType,
                'filesize' => $filesize,
                'slug' => $image_path,
                'created_by' => Auth::user()->id,
            ]);
        }

        Employee::where('id', $id)->update([
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
            "avatar_id" => (empty($doc)) ? null : $doc->id
        ]);

        // return redirect()->route('employee.show', $id);
        return Inertia::location(route('employee.show', $id));
    }

    public function show($employee_id)
    {
        $employee = Employee::with([
            'dependents',
            'work_experiences',
            'educ_backgrounds',
            'avatar',
            'memos',
            'emp_status_histories.employee_statuses',
            'emp_curr_status.employee_statuses',
            'emp_type_histories.employee_types',
            'emp_curr_type.employee_types',
            'emp_compensation_histories.pay_types',
            'emp_job_histories.locations',
            'emp_job_histories.departments',
            'emp_job_histories.positions',
            'emp_curr_work.locations',
            'emp_curr_work.departments',
            'emp_curr_work.positions',
            'documents.document_category',
            'documents.created_by',
        ])->find($employee_id);

        // dd($employee);

        $employeeTypes = EmployeeType::all();
        $employee_status = EmployeeStatus::all();
        $departments =  Department::all();
        $positions =  Position::all();
        $locations =  Location::all();
        $paytypes =  PayType::all();
        $employees =  Employee::all();
        $docCategories =  DocumentCategory::all();
        $hiringRequirements =  HiringRequirement::all();

        // dd($employee);

        return Inertia::render('Employee/Profile/Index', compact('employee', 'employeeTypes', 'employee_status', 'departments', 'positions', 'locations', 'paytypes', 'employees', 'docCategories', 'hiringRequirements'));
    }
}
