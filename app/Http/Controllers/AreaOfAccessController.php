<?php

namespace App\Http\Controllers;

use App\Models\AreaOfAccess;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AreaOfAccessController extends Controller
{
    public function index()
    {
        $aoa = AreaOfAccess::all();

        return Inertia::render('LoginParam/Index', compact('aoa'));
    }

    public function update(Request $request, $id)
    {
        $aoa = AreaOfAccess::find($id);
        $aoa->update([
            'coordinates' => $request->coordinates,
            'radius' => $request->radius,
        ]);
        return redirect()->route('user.loginparam');
    }
}
