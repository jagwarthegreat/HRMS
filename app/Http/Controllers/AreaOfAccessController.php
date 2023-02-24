<?php

namespace App\Http\Controllers;

use App\Models\AreaOfAccess;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class AreaOfAccessController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('login_parameter_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $aoa = AreaOfAccess::all();

        return Inertia::render('LoginParam/Index', compact('aoa'));
    }

    public function update(Request $request, $id)
    {
        abort_if(
            Gate::denies('login_parameter_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        $aoa = AreaOfAccess::find($id);
        $aoa->update([
            'coordinates' => $request->coordinates,
            'radius' => $request->radius,
        ]);
        return redirect()->route('user.loginparam');
    }
}
