<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class UserProfileController extends Controller
{
    public function index()
    {
        $current_user = Auth::user()->id;

        $user = User::find($current_user);
        $canCreate = Gate::allows('user_management_access');

        return Inertia::render('User/Profile/Index', compact('user', 'canCreate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "username" => ['required'],
        ]);

        $image_path = '';
        $doc = [];
        if ($request->hasFile('user_avatar')) {
            $file = $request->file('user_avatar');
            $filename = $file->getClientOriginalName();
            $filesize = $file->getSize();
            $fileType = $file->getClientOriginalExtension();

            $image_path = $request->file('user_avatar')->store('user', 'public');

            $user = User::find($id);
            if ($user->avatar_slug != null) {
                if (Storage::disk('public')->exists($user->avatar_slug)) {
                    Storage::disk('public')->delete($user->avatar_slug);
                    $user->avatar_slug = null;
                    $user->save();
                }
            }

            User::where('id', $id)->update([
                "avatar_slug" => $image_path,
            ]);
        }



        // return redirect()->route('user.profile');
        return Inertia::location(route('user.profile'));
    }
}
