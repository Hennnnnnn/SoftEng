<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $userList = [
            [
                'username' => 'user1'
            ],
            [
                'username' => 'user2'
            ],
            [
                'username' => 'user3'
            ]
            ];

        return view('pages.discussion', compact('postList', 'userList'));
    }
}
