<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    //
    public function show()
    {
        $postList = Discussion::all();
        $userList = User::all();
        $authUser = auth()->user();

        return view('pages.discussion', compact('postList', 'userList', 'authUser'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Simpan diskusi baru
        Discussion::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'likes_count' => 0,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('status', 'Discussion started successfully!');
    }

    // Misalnya, di dalam controller PostController
    public function addLike($postId)
    {
        $discussion = Discussion::findOrFail($postId);
        $user = Auth::user();

        if (!$discussion->likedByUsers()->where('user_id', $user->id)->exists()) {
            $discussion->likedByUsers()->attach($user->id);
            $discussion->increment('likes_count');
            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'User already liked this post'], 400);
    }

    public function removeLike($postId)
    {
        $discussion = Discussion::findOrFail($postId);
        $user = Auth::user();

        if ($discussion->likedByUsers()->where('user_id', $user->id)->exists()) {
            $discussion->likedByUsers()->detach($user->id);
            $discussion->decrement('likes_count');
            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'User has not liked this post'], 400);
    }
}
