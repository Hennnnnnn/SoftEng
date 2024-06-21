<?php

namespace App\Http\Controllers;

use App\Models\DIY;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function show()
    {
        $list = DIY::orderBy('created_at', 'desc')->get();
        $listTrending = DIY::orderBy('likes_count', 'desc')->get();

        return view('pages.diy-list.index', compact('list', 'listTrending'));
    }

    public function index()
    {
        $list = DIY::all();

        return view('pages.home', compact('list'));
    }

    public function add(Request $request)
    {
        return view('pages.diy-list.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust validation rules as needed
        ]);

        // Initialize imagePath variable
        $imagePath = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'upload/diy/';
            $file->move(public_path($path), $filename); // Save the file to public disk
            $imagePath = $path . $filename;
        }

        DIY::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath, // Assign imagePath which may be null
        ]);

        return redirect()->route('diy-list')->with('success', 'DIY item created successfully.');
    }

    public function showList()
    {
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

        $list2 = [];

        return view('pages.diy-list.index', compact('list', 'list2'));
    }
}
