<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;

class PermisionController extends Controller
{
    public function index()
    {
        return Inertia::render('Permission/Index', [
            'permissions' => Employee::where('id', '>', '0')->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Permission/Create');
    }
}
