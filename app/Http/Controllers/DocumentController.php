<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;

class DocumentController extends Controller
{
    public function store(Request $request)
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

            $image_path = $request->file('doc_file')->store('employee', 'public');

            Document::create([
                'employee_id' => $request->employee_id,
                'category_id' => $request->doc_category,
                'filename' => $filename,
                'filetype' => $fileType,
                'filesize' => $filesize,
                'slug' => $image_path,
                'created_by' => Auth::user()->id,
            ]);

        }
        sleep(1);

        return redirect('employee/' . $request->employee_id);
    }
}
