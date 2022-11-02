<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => User::where('id', '>', '0')->with('employee')->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create');
    }
}
