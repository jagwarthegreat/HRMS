<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Permission;

class PermisionController extends Controller
{
    public function index()
    {
        $permissions = Permission::where('id', '>', '0')->orderBy('id', 'desc')->get();

        return Inertia::render('Permission/Index', compact('permissions'));
    }

    public function create()
    {
        return Inertia::render('Permission/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $permission = Permission::create([
            'title' => $request->title,
        ]);

        // return response()->json([
        //     'message' => 'Permission Created Successfully!!',
        //     'class' => $permission
        // ]);

        return redirect('permission');
    }
}
