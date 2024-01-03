<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override the default login method
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log in the user
        $credentials = $request->only($this->username(), 'password');

        if (auth()->attempt($credentials, $request->filled('remember'))) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    // Customized method to redirect to the login form
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        return view('auth.login');
    }

    // Remove unnecessary methods related to showing the login form and role-specific login forms
}
