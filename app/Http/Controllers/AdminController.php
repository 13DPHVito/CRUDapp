<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::all();
        $users = User::where('is_admin', false)->get(); // Exclude admin users
        return view('admin.dashboard', compact('posts', 'users'));
    }

    public function removePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('success', 'Post has been removed.');
    }

    public function removeUser($id)
    {
        $user = User::findOrFail($id);
        if (!$user->is_admin) {
            $user->delete();
            return redirect()->back()->with('success', 'User has been removed.');
        } else {
            return redirect()->back()->with('error', 'Cannot remove admin users.');
        }
    }
    public function muteUser(User $user) {
        $user->is_muted = true; // Assuming there's a field in your User model to track if a user is muted
        $user->save();
    
        return redirect()->back()->with('success', 'User has been muted.');
    }
}