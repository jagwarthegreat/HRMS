<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Document;
use App\Models\Location;
use App\Models\DocumentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('clients_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $clients = Client::all();

        return Inertia::render('Client/Index', compact('clients'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('clients_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return Inertia::render('Client/Create');
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('clients_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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

    public function update(Request $request)
    {
        abort_if(
            Gate::denies('clients_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            "name" => ['required'],
            "contact" => ['required'],
            "email" => ['email'],
        ]);

        Client::where('id', $request->client_id)->update([
            "name" => $request->name,
            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
        ]);

        return redirect('client');
        // return Inertia::location(route('client'));
    }

    public function show($client_id)
    {
        abort_if(
            Gate::denies('clients_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $client = Client::with([
            'documents',
            'documents.document_category',
            'documents.created_by',
            'locations',
            'locations.employees.employee',
            'locations.employees.departments',
            'locations.employees.positions',
        ])->find($client_id);
        $locations =  Location::all();
        $docCategories =  DocumentCategory::all();

        // dd($client);

        return Inertia::render('Client/Profile/Index', compact('client', 'locations', 'docCategories'));
    }

    public function docsstore(Request $request)
    {
        abort_if(
            Gate::denies('clients_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

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

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('clients_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        Location::find($id)->delete();

        return redirect()->route('client.show', $request->client_id);
    }
}
