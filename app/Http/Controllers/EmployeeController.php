<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return Inertia::render('Employee/Index', [
            'employees' => Employee::where('id', '>', '0')->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Employee/Create');
    }
}
