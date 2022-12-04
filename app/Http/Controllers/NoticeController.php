<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class NoticeController extends Controller
{
    public function index()
    {
        // abort_if(
        //     Gate::denies('position_access'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $notices = Notice::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Notice/Index', compact('notices', 'canCreate'));
    }

    public function store(Request $request)
    {
        // abort_if(
        //     Gate::denies('position_create'),
        //     Response::HTTP_FORBIDDEN,
        //     '403 Forbidden'
        // );

        $request->validate([
            'notice_for' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'notice_date' => 'required',
        ]);

        Notice::create([
            'notice_for' => $request->notice_for,
            'subject' => $request->subject,
            'content' => htmlentities(str_replace("'", "&#x2019;", $request->content)),
            'notice_date' => $request->notice_date
        ]);

        return redirect()->route('notice');
    }

    public function destroy(Request $request, $id)
    {
        Notice::find($id)->delete();

        return redirect()->route('notice');
    }
}
