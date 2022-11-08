<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('role_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $roles = Role::with('permissions')->get();
        $canCreate = Gate::allows('role_create');

        return Inertia::render('Role/Index', compact('roles', 'canCreate'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('role_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $permissions = Permission::where('id', '>', '0')->get();
        return Inertia::render('Role/Create', compact('permissions'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('role_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'roletitle' => 'required',
        ]);

        $role = Role::create([
            'title' => $request->roletitle,
        ]);

        $role->permissions()->sync($request->rolepermission);
        return redirect('role');
    }
}
