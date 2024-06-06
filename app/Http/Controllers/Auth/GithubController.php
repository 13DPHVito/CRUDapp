<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    const DRIVER_TYPE = 'github';

    public function handleGithubRedirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver(static::DRIVER_TYPE)->user();
            
            $userExisted = User::where('oauth_id', $user->id)
                ->where('oauth_type', static::DRIVER_TYPE)
                ->first();
    
            if ($userExisted) {
                Auth::login($userExisted);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => static::DRIVER_TYPE,
                    'password' => Hash::make($user->id)
                ]);
    
                AddingTeam::dispatch($newUser);
    
                $newUser->switchTeam($team = $newUser->ownedTeams()->create([
                    'name' => $newUser->name . "'s Team",
                    'personal_team' => false
                ]));
    
                $newUser->update(['current_team_id' => $newUser->id]);
    
                Auth::login($newUser);
            }
    
            return redirect('/posts');
        } catch (Exception $e) {
            // Log or handle the exception as needed
            // For debugging: dd($e);
            return redirect()->route('home')->with('error', 'Login with GitHub failed.');
        }
    }
    
    
 
}