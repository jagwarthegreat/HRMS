<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\EmployeeStatus;
use App\Models\Department;
use App\Models\EmployeeType;
use App\Models\Location;
use App\Models\PayType;
use App\Models\Position;
use App\Models\EmpJobHistory;

class DeploymentController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('deployment_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $deployments = EmpJobHistory::with([
            'locations',
            'departments',
            'positions',
            'employee'
        ])->latest()->get();

        $employee_status = EmployeeStatus::all();
        $employeeTypes = EmployeeType::all();
        $departments =  Department::all();
        $positions =  Position::all();
        $locations =  Location::all();
        $paytypes =  PayType::all();
        $employees =  Employee::all();
        $canCreate = Gate::allows('position_create');

        // dd($employee_status, $employeeTypes, $departments, $departments, $positions, $locations, $paytypes, $employees, $deployments);

        return Inertia::render('Deployment/Index', compact('employee_status', 'employeeTypes', 'departments', 'departments', 'positions', 'locations', 'paytypes', 'employees', 'deployments', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('deployment_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'employees' => 'required',
            'trans_date' => 'required',
            'location' => 'required',
            'department' => 'required',
            'position' => 'required'
        ]);

        foreach ($request->employees as $employee) {
            // insert to job history
            if ($request->location != "" && $request->department != "" && $request->position != "") {
                EmpJobHistory::where('employee_id', $employee['value'])->update([
                    'status' => 0,
                ]);

                EmpJobHistory::create([
                    'employee_id' => $employee['value'],
                    'location_id' => $request->location,
                    'department_id' => "$request->department",
                    'position_id' => "$request->position",
                    'trans_date' => date('Y-m-d'),
                    'status' => 1
                ]);
            }
        }

        return redirect()->route('deployment');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('deployment_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        EmpJobHistory::find($id)->delete();

        return redirect()->route('deployment');
    }
}
