<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LocationController extends Controller
{
    public function index()
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $locations = Location::with('client')->get();
        $clients = Client::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Location/Index', compact('locations', 'clients', 'canCreate'));
    }

    public function store(Request $request)
    {
        // abort_if(
        //     Gate::denies('position_create'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $request->validate([
            'title' => 'required',
            'client' => 'required'
        ]);

        Location::create([
            'title' => $request->title,
            'client_id' => $request->client
        ]);
        return redirect()->route('location');;
    }

    public function destroy(Request $request, $id)
    {
        Location::find($id)->delete();

        return redirect()->route('location');
    }
}
