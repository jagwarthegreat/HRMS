<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeTypeController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('employment_types_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $types = EmployeeType::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Settings/EmployeeTypes/Index', compact('types', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('employment_types_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        EmployeeType::create([
            'title' => $request->title
        ]);
        return redirect('settings/employee/types');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('employment_types_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        EmployeeType::find($id)->delete();

        return redirect()->route('settings.emp.types');
    }
}
