<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $followingCount = $user->following()->count();
        $followersCount = $user->followers()->count();

        return view('pages.profile.profile', compact('user', 'followingCount', 'followersCount'));
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone_number' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telephone_number = $request->input('telephone_number');
        $user->gender = $request->input('gender');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Store new image
            $path = $request->file('image')->store('public/profile_images');
            $user->image = $path;
        }

        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }

    public function follow(User $user)
    {
        $authUser = Auth::user();
        if (!$authUser->following->contains($user->id)) {
            $authUser->following()->attach($user->id);
        }
        return redirect()->back();
    }

    public function unfollow(User $user)
    {
        $authUser = Auth::user();
        if ($authUser->following->contains($user->id)) {
            $authUser->following()->detach($user->id);
        }
        return redirect()->back();
    }
}
