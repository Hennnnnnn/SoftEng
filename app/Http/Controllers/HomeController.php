<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function show () {

        $list = [
            [
                "name" => "DIY TUTOR 1",
                "username" => "user1",
                "likes" => 100000,
                
            ],
            [
                "name" => "DIY TUTOR 2",
                "username" => "user3",
                "likes" => 1000000
            ],
            [
                "name" => "DIY TUTOR 3",
                "username" => "user3",
                "likes" => 10
            ],

        ];
        return view('pages.home', compact('list'));
    }

    public function showList() {
        $list = [
            [
                "name" => "DIY TUTOR 1 NEW",
                "username" => "user1",
                "likes" => 100000,
                
            ],
            [
                "name" => "DIY TUTOR 2 NEW",
                "username" => "user3",
                "likes" => 1000000
            ],
            [
                "name" => "DIY TUTOR 3 NEW",
                "username" => "user3",
                "likes" => 10
            ],
            [
                "name" => "DIY TUTOR 4 NEW",
                "username" => "user1",
                "likes" => 100000,
                
            ],
            [
                "name" => "DIY TUTOR 5 NEW",
                "username" => "user3",
                "likes" => 1000000
            ],
            [
                "name" => "DIY TUTOR 6 NEW",
                "username" => "user3",
                "likes" => 10
            ],
            [
                "name" => "DIY TUTOR 7 NEW",
                "username" => "user1",
                "likes" => 100000,
                
            ],
            [
                "name" => "DIY TUTOR 8 NEW",
                "username" => "user3",
                "likes" => 1000000
            ],
            [
                "name" => "DIY TUTOR 9 NEW",
                "username" => "user3",
                "likes" => 10
            ],

        ];

        $list2 = [

        ];

        return view('pages.diy-list', compact('list', 'list2'));
    }
}
