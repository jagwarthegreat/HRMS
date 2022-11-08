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

        $positions = Position::where('id', '>', '0')->orderBy('id', 'desc')->get();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Position/Index', compact('positions', 'canCreate'));
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
        abort_if(
            Gate::denies('position_create'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        Position::create([
            'title' => $request->title
        ]);
        return redirect('position');
    }
}
