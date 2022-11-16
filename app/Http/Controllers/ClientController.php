<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Document;
use App\Models\Location;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "contact" => ['required'],
            "email" => ['email'],
        ]);

        $client = Client::create([
            "name" => $request->name,
            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
        ]);

        return redirect('client');
    }

    public function show($client_id)
    {
        $client = Client::with([
            'documents',
            'documents.document_category',
            'documents.created_by',
        ])->find($client_id);
        $locations =  Location::all();
        $docCategories =  DocumentCategory::all();

        return Inertia::render('Client/Profile/Index', compact('client', 'locations', 'docCategories'));
    }

    public function docsstore(Request $request)
    {
        $request->validate([
            'doc_category' => 'required',
        ]);

        $image_path = '';
        if ($request->hasFile('doc_file')) {
            $file = $request->file('doc_file');
            $filename = $file->getClientOriginalName();
            $filesize = $file->getSize();
            $fileType = $file->getClientOriginalExtension();

            $image_path = $request->file('doc_file')->store('client', 'public');

            Document::create([
                'client_id' => $request->client_id,
                'category_id' => $request->doc_category,
                'filename' => $filename,
                'filetype' => $fileType,
                'filesize' => $filesize,
                'slug' => $image_path,
                'created_by' => Auth::user()->id,
            ]);
        }
        sleep(1);

        return redirect('client/' . $request->client_id);
    }
}
