<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('id', '>', '0')->get();

        return Inertia::render('Employee/Index', compact('employees'));
    }

    public function create()
    {
        return Inertia::render('Employee/Create');
    }
}
