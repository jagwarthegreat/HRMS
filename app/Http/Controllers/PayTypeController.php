<?php

namespace App\Http\Controllers;

use App\Models\PayType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PayTypeController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('compensation_types_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $paytypes = PayType::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Settings/CompensationTypes/Index', compact('paytypes', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('compensation_types_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        PayType::create([
            'title' => $request->title
        ]);
        return redirect('settings/compensation/types');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('compensation_types_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        PayType::find($id)->delete();

        return redirect()->route('settings.compensation.types');
    }
}
