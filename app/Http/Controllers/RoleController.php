<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return Inertia::render('Role/Index', [
            'roles' => Role::where('id', '>', '0')->orderBy('id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Role/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'permissions' => 'required'
        ]);

        $role = Role::create([
            'title' => $request->title,
            'permissions' => $request->title,
        ]);

        // return response()->json([
        //     'message' => 'Permission Created Successfully!!',
        //     'class' => $permission
        // ]);

        return redirect('role');
    }
}
