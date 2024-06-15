<?php

namespace App\Http\Controllers;

use App\Models\RecyclingItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecyclingItemController extends Controller
{
    /**
     * Show the form for creating a new recycling item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch all users
        $users = User::all();

        // Ensure $users is not empty
        if ($users->isEmpty()) {
            return redirect()->back()->with('error', 'No users found.');
        }

        return view('pages.recycle.create', compact('users'));
    }

    /**
     * Store a newly created recycling item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string',
            'quantity' => 'required|integer',
            'pick_up_address' => 'required|string',
            'pick_up_date' => 'required|date',
            'telephone_number' => 'required|string',
        ]);

        // Create a new RecyclingItem record
        $recyclingItem = RecyclingItem::create($validatedData);

        // Calculate points to be awarded
        $pointsPerItem = 10; // Example: 10 points per item recycled

        // Retrieve the User record and update points
        $user = User::find($validatedData['user_id']);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update the user's points
        $user->points += $validatedData['quantity'] * $pointsPerItem;
        $user->save();

        // Redirect back to the create page with success message
        return redirect()->route('recycle.create')->with('success', 'Recycling item created successfully and points updated.');
    }
}
