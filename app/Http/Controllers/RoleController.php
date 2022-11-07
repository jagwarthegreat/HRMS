<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::where('id', '>', '0')->get();
        $roles = Role::where('id', '>', '0')->orderBy('id', 'desc')->get();
        return Inertia::render('Role/Index', compact('roles', 'permissions'));
    }

    public function create()
    {
        $permissions = Permission::where('id', '>', '0')->get();
        return Inertia::render('Role/Create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'roletitle' => 'required',
        ]);

        $role = Role::create([
            'title' => $request->roletitle,
            'permissions' => implode(',', $request->rolepermission),
        ]);

        // return response()->json([
        //     'message' => 'Permission Created Successfully!!',
        //     'class' => $permission
        // ]);

        return redirect('role');
    }
}
