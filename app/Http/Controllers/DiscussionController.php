<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DiscussionController extends Controller
{
    //
    public function show() {
        $postList = [
            [
                'name' => 'ONE',
                'status' => true,
            ],
            [
                'name' => 'TWO',
                'status' => true,
            ],
            [
                'name' => 'THREE',
                'status' => true,
            ],
            [
                'name' => 'FOUR',
                'status' => false,
            ],
            [
                'name' => 'FIVE',
                'status' => false,
            ]
        ];

        $userList = User::all();

        return view('pages.discussion', compact('postList', 'userList'));
    }
}
