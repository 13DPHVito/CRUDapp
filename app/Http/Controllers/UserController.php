<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request) {
        // Validate the incoming request
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        // Determine if the login input is an email or a name
        $loginType = filter_var($incomingFields['loginname'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // Attempt to authenticate
        if (Auth::attempt([$loginType => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/posts');
        } else {
            return redirect('/')->withErrors(['loginerror' => 'The provided credentials do not match our records.']);
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
    public function settings(Request $request)
    {
        return view('settings');
    }

    public function updateProfile(Request $request)
    {
    }
 
 
}