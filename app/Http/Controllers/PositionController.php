<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PositionController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('position_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $positions = Position::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Position/Index', compact('positions', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('position_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        if($request->position_id == ''){
            Position::create([
                'title' => $request->title
            ]);
        }else{
            Position::where('id', $request->position_id)->update([
                'title' => $request->title
            ]);
        }

        return redirect()->route('position');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('position_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        Position::find($id)->delete();

        return redirect()->route('position');
    }
}
