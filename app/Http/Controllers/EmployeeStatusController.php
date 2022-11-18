<?php

namespace App\Http\Controllers;

use App\Models\EmployeeStatus;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeStatusController extends Controller
{
    public function index()
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $statuses = EmployeeStatus::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Settings/EmployeeStatuses/Index', compact('statuses', 'canCreate'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('position_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return Inertia::render('Position/Create');
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

        EmployeeStatus::create([
            'title' => $request->title
        ]);
        return redirect('settings/employee/statuses');
    }

    public function destroy(Request $request, $id)
    {
        EmployeeStatus::find($id)->delete();

        return redirect()->route('settings.emp.statuses');
    }
}
