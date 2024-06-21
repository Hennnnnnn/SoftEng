<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscussionController extends Controller
{
    //
    public function show() {
        $postList = Discussion::all();
        $userList = User::all();

        return view('pages.discussion', compact('postList', 'userList'));
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
}
