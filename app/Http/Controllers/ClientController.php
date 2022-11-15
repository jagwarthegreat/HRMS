<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return Inertia::render('Client/Index', compact('clients'));
    }

    public function create()
    {
        return Inertia::render('Client/Create');
    }

    public function show($client_id)
    {
        $client = Client::find($client_id);

        return Inertia::render('Client/Profile/Index', compact('client'));
    }
}
