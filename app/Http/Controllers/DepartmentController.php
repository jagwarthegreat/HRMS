<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    public function index()
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $departments = Department::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Department/Index', compact('departments', 'canCreate'));
    }

    public function store(Request $request)
    {
        // abort_if(
        //     Gate::denies('position_create'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $request->validate([
            'title' => 'required'
        ]);

        Department::create([
            'title' => $request->title
        ]);
        return redirect()->route('department');
    }

    public function destroy(Request $request, $id)
    {
        Department::find($id)->delete();

        return redirect()->route('department');
    }
}
