<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DocumentCategoryController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('document_category_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $doccategories = DocumentCategory::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Settings/DocumentCategories/Index', compact('doccategories', 'canCreate'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('document_category_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'title' => 'required'
        ]);

        DocumentCategory::create([
            'title' => $request->title
        ]);
        return redirect('settings/document/category');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('document_category_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        DocumentCategory::find($id)->delete();

        return redirect()->route('settings.doc.category');
    }
}
