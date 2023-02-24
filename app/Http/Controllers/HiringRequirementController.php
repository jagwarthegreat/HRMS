<?php

namespace App\Http\Controllers;

use App\Models\HiringRequirement;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HiringRequirementController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('hiring_requirements_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $hiringreqs = HiringRequirement::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Settings/HiringRequirements/Index', compact('hiringreqs', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('hiring_requirements_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        if($request->req_id == ''){
            HiringRequirement::create([
                'title' => $request->title
            ]);
        }else{
            HiringRequirement::where('id', $request->req_id)->update([
                'title' => $request->title
            ]);
        }

        return redirect('settings/hiring/requirements');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('hiring_requirements_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        HiringRequirement::find($id)->delete();

        return redirect()->route('settings.requirement.category');
    }
}
