<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
        echo "test1";
        

        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);
    
        // Attempt to authenticate the user
        if (Auth::attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            // Authentication successful
            $request->session()->regenerate();
             // Redirect to the intended URL or any other desired URL
            return redirect()->intended('/');
        }
    
        // Authentication failed, redirect back with errors
        return redirect()->back()->withInput()->withErrors(['loginname' => 'Invalid credentials']);
    }
    
    

    public function logout()
    {
        Auth::logout();
        return redirect('/loginregister');
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $incomingFields['password'] = Hash::make($incomingFields['password']);
        $user = User::create($incomingFields);

        Auth::login($user);

        return redirect('/');
    }
}
