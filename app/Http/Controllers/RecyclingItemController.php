<?php

namespace App\Http\Controllers;

use App\Models\RecyclingItem;
use Illuminate\Http\Request;

class RecyclingItemController extends Controller
{

    public function create()
    {
        return view('pages.recycle.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'quantity' => 'required|integer',
            'pick_up_address' => 'required|string',
            'pick_up_date' => 'required|date',
            'telephone_number' => 'required|string',
        ]);

        RecyclingItem::create($validatedData);
        return redirect()->route('recycle.create');
    }

}
