<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
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
        $user = User::find($id);
        if ($request->hasFile('user_avatar')) {
            $file = $request->file('user_avatar');
            $filename = $file->getClientOriginalName();
            $filesize = $file->getSize();
            $fileType = $file->getClientOriginalExtension();

            $image_path = $request->file('user_avatar')->store('user', 'public');

            if ($user->avatar_slug != null) {
                if (Storage::disk('public')->exists($user->avatar_slug)) {
                    Storage::disk('public')->delete($user->avatar_slug);
                    $user->avatar_slug = null;
                    $user->save();
                }
            }

            $avatar = $image_path;

        } else {
            // update details not the employee avatar
            // check docs if avatar is already present
            $avatar = $user->avatar_slug;
        }

        if(!is_null($request->password)){
           User::where('id', $id)->update([
                "username" => $request->username,
                "password" => Hash::make($request->password),
                "avatar_slug" => $avatar,
            ]);
        }else{
            User::where('id', $id)->update([
                "username" => $request->username,
                "avatar_slug" => $avatar,
            ]);
        }

        // return redirect()->route('user.profile');
        return Inertia::location(route('user.profile'));
    }
}
