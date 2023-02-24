<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('department_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $departments = Department::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Department/Index', compact('departments', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('department_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        if($request->dept_id == ''){
            Department::create([
                'title' => $request->title
            ]);
        }else{
            Department::where('id', $request->dept_id)->update([
                'title' => $request->title
            ]);
        }

        return redirect()->route('department');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('department_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        Department::find($id)->delete();

        return redirect()->route('department');
    }
}
