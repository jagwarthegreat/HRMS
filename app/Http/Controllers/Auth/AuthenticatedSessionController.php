<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginParameterController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
            'appName' => config('app.name'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = User::where("username", "=", $request->username)->with('employee')->first();

        if($user == null){
            return redirect()->route('login')->with('message', 'Account does not match in our records.');
        }

        $passchecker = Hash::check($request->password, $user->password);

        if ($passchecker) {
            if ($user->employee_id == 0) {
                // super user allow to loging without area parameter checking
                $request->authenticate();
                $request->session()->regenerate();
            } else {
                if($user->limited_access_status == 1){
                    // system users
                    $isInArea = LoginParameterController::getDistance($request->long, $request->lat);
                    if ($isInArea == 1) {
                        $request->authenticate();
                        $request->session()->regenerate();
                    } else {
                        // $_SESSION['system']['error'] = "You are not in the given area!";
                        return redirect()->route('login');
                    }
                }else{
                    $request->authenticate();
                    $request->session()->regenerate();
                }
            }

        }

        // return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
