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
        // Validate the incoming request
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Define the storage path for the profile images
            $storagePath = 'public/profile_images';

            // Store the file in the defined storage path
            $file->storeAs($storagePath, $filename);

            // Delete the old profile image if it exists
            if ($user->image && Storage::exists($storagePath . '/' . $user->image)) {
                Storage::delete($storagePath . '/' . $user->image);
            }

            // Update the user's profile image field with the new filename
            $user->image = $filename;
        }

        // Save the user data
        $user->save();

        // Redirect back with a success message
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
