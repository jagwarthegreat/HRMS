<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Notice;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class NoticeController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('notice_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $notices = Notice::all();
        $employees = Employee::all();
        $clients = Client::all();
        $canCreate = Gate::allows('position_create');

        return Inertia::render('Notice/Index', compact('notices', 'canCreate', 'employees', 'clients'));
    }

    public function store(Request $request)
    {
        abort_if(
            Gate::denies('notice_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        $request->validate([
            'notice_for' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'notice_date' => 'required',
        ]);

        $ids = [];
        $names = [];
        foreach ($request->notice_for as $recepient) {
            $ids[] = $recepient['value'];
            $names[] = $recepient['text'];
        }

        //dd($ids, $names);

        Notice::create([
            'notice_for' => implode(",", $names),
            'notice_for_ids' => implode(",", $ids),
            'subject' => $request->subject,
            'content' => htmlentities(str_replace("'", "&#x2019;", $request->content)),
            'notice_date' => $request->notice_date
        ]);

        return redirect()->route('notice');
    }

    public function destroy(Request $request, $id)
    {
        abort_if(
            Gate::denies('notice_access'),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );
        
        Notice::find($id)->delete();

        return redirect()->route('notice');
    }
}
