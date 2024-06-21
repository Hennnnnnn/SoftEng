<?php

namespace App\Http\Controllers;

use App\Models\DIY;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function show () {

        $list = DIY::all();

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

        return view('pages.diy-list.index', compact('list', 'list2'));
    }

    public function add() {
        return view('pages.diy-list.create');
    }
}
