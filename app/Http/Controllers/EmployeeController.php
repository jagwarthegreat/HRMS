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
use App\Models\EmpRequirement;
use App\Models\EmpStatusHistory;
use App\Models\EmpTypeHistory;
use App\Models\Location;
use App\Models\PayType;
use App\Models\Position;
use App\Models\HiringRequirement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('employee_management_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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

        $departments =  Department::all();
        $locations =  Location::all();

        return Inertia::render('Employee/Index', compact('employees', 'departments', 'locations'));
    }

    public function filter()
    {
        abort_if(
            Gate::denies('employee_management_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        if($_REQUEST['filter_by_branch'] != '-1' || $_REQUEST['filter_by_dept'] != '-1'){
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
            ])->whereHas('emp_curr_work.locations', function ($query) {
                if (array_key_exists('filter_by_branch', $_REQUEST) && $_REQUEST['filter_by_branch'] != '-1') {
                    $filterByLocation = $_REQUEST['filter_by_branch'];
                    $query->where('id', $filterByLocation);
                }
            })->whereHas('emp_curr_work.departments', function ($query) {
                if (array_key_exists('filter_by_dept', $_REQUEST) && $_REQUEST['filter_by_dept'] != '-1') {
                    $filterByDepartment = $_REQUEST['filter_by_dept'];
                    $query->where('id', $filterByDepartment);
                }
            })->get();
        }else{
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
        }

        $response['data'] = [];
        $list = [];
        $counter = 1;

        foreach ($employees as $employee) {
            $list['counter'] = $counter;
            $list['employee_id'] = $employee->id;
            $list['employee_name'] = $employee->lastname . ", " . $employee->firstname . " " . $employee->middlename;
            $list['position'] =  $employee->emp_curr_work == null ? "--" : $employee->emp_curr_work->positions->title;
            $list['department'] = $employee->emp_curr_work == null ? "---" : $employee->emp_curr_work->departments->title;
            $list['employee_type'] = $employee->emp_curr_type == null ? "---" : $employee->emp_curr_type->employee_types->title;
            $list['status'] = $employee->emp_curr_status == null ? "---" : $employee->emp_curr_status->employee_statuses->title;

            array_push($response['data'], $list);
            $counter++;
        }

        echo json_encode($response);
    }

    public function create()
    {
        abort_if(
            Gate::denies('employee_management_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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
        abort_if(
            Gate::denies('employee_management_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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
        abort_if(
            Gate::denies('employee_management_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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
        }else{
            // update details not the employee avatar
            // check docs if avatar is already present
            $doc = Document::where('employee_id', $id)
                ->where('category_id', null)
                ->first();
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
        abort_if(
            Gate::denies('employee_management_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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
            'emp_requirements'
        ])->find($employee_id);

        $employeeTypes = EmployeeType::all();
        $employee_status = EmployeeStatus::all();
        $departments =  Department::all();
        $positions =  Position::all();
        $locations =  Location::all();
        $paytypes =  PayType::all();
        $employees =  Employee::all();
        $docCategories =  DocumentCategory::all();
        $hiringRequirements =  HiringRequirement::all();

        $requirementsWithCheck = [];
        foreach ($hiringRequirements as $req) {

            $reqs = EmpRequirement::where("employee_id", $employee_id)
                ->where('requirement_id', $req->id)
                ->first();

            if ($reqs) {
                $isChecked = "checked";
            } else {
                $isChecked = "";
            }

            $requirementsWithCheck[$req->title]["req_id"] = $req->id;
            $requirementsWithCheck[$req->title]["ischecked"] = $isChecked;
        }

        // dd($requirementsWithCheck);

        return Inertia::render('Employee/Profile/Index', compact('employee', 'employeeTypes', 'employee_status', 'departments', 'positions', 'locations', 'paytypes', 'employees', 'docCategories', 'requirementsWithCheck'));
    }

    public function contractReport()
    {
        abort_if(
            Gate::denies('contract_report'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return Inertia::render("Report/Employee/Contract");
    }

    public function contractFilter()
    {
        abort_if(
            Gate::denies('contract_report'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $date_now = date("Y-m-d");
        $next_five_months = date("Y-m-d", strtotime($date_now .' +'.$_REQUEST['contract_month'].' months'));

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
        ])
        ->whereHas('emp_curr_status.employee_statuses', function ($query) {
            $query->where('id', 1);
        })
        ->whereBetween('contract_end_date', [$date_now, $next_five_months])
        ->get();

        $response['data'] = [];
        $list = [];
        $counter = 1;

        foreach ($employees as $employee) {
            $list['counter'] = $counter;
            $list['employee_id'] = $employee->id;
            $list['employee_name'] = $employee->lastname . ", " . $employee->firstname . " " . $employee->middlename;
            $list['position'] =  $employee->emp_curr_work == null ? "--" : $employee->emp_curr_work->positions->title;
            $list['department'] = $employee->emp_curr_work == null ? "---" : $employee->emp_curr_work->departments->title;
            $list['contract_end_date'] = $employee->contract_end_date;
            $list['status'] = $employee->emp_curr_status == null ? "---" : $employee->emp_curr_status->employee_statuses->title;

            array_push($response['data'], $list);
            $counter++;
        }

        echo json_encode($response);
    }

    public function statusReport()
    {
        abort_if(
            Gate::denies('employee_status_report_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $employee_status = EmployeeStatus::all();
        return Inertia::render("Report/Employee/Status", compact('employee_status'));
    }

    public function statusFilter()
    {
        abort_if(
            Gate::denies('employee_status_report_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
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
        ])
        ->whereHas('emp_curr_status.employee_statuses', function ($query) {
            $status_id = $_REQUEST['status_id'];
            $query->where('id', $status_id);
        })->get();

        $response['data'] = [];
        $list = [];
        $counter = 1;

        foreach ($employees as $employee) {
            $list['counter'] = $counter;
            $list['employee_id'] = $employee->id;
            $list['employee_name'] = $employee->lastname . ", " . $employee->firstname . " " . $employee->middlename;
            $list['position'] =  $employee->emp_curr_work == null ? "--" : $employee->emp_curr_work->positions->title;
            $list['department'] = $employee->emp_curr_work == null ? "---" : $employee->emp_curr_work->departments->title;
            $list['contract_end_date'] = $employee->contract_end_date;
            $list['status'] = $employee->emp_curr_status == null ? "---" : $employee->emp_curr_status->employee_statuses->title;

            array_push($response['data'], $list);
            $counter++;
        }
        
        echo json_encode($response);
    }
}
