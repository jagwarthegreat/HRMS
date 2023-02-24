<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('user_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $roles = Role::where("id", "!=", 1)->get();
        $employees = Employee::all();
        $users = User::where('employee_id', '!=', '0')->with(['employee', 'roles'])->get();
        $canCreate = Gate::allows('user_access');

        return Inertia::render('User/Index', compact('users', 'canCreate', 'roles', 'employees'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('user_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $roles = Role::where("id", "!=", 1)->get();
        $employees = Employee::all();
        return Inertia::render('User/Create', compact('roles', 'employees'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('user_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'employee' => 'required',
            'roles' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $emp = Employee::find($request->employee);
        $user_fullname = $emp->firstname . " " . $emp->middlename . " " . $emp->lastname;

        $user = User::create([
            'employee_id' => $request->employee,
            'name' => $user_fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'limited_access_status' => $request->limited_access
        ]);

        $user->roles()->sync($request->roles);
        return redirect('user');
    }
}
