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

    public function edit()
    {
        $user = Auth::user();
        return view('pages.profile.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'telephone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'upload/profile_images/';
            $file->move($path, $filename);

            // Hapus file lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($path . $user->image);
            }

            // Simpan nama file ke basis data
            $user->image = $filename;
        }


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->telephone_number = $request->input('telephone_number');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->save();

        return redirect()->route('user.profile.index')->with('success', 'Profile updated successfully.');
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
