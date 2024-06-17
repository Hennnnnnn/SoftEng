<?php

namespace App\Http\Controllers;

use App\Models\RecyclingItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


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
            'type' => 'required|string',
            'quantity' => 'required|integer',
            'pick_up_address' => 'required|string',
            'pick_up_date' => 'required|date',
            'telephone_number' => 'required|string',
        ]);

        // Calculate points to be awarded
        $pointsPerItem = 10; // Example: 10 points per item recycled

        // Retrieve the User record and update points using raw SQL query
        $userId = Auth::id();
        $affected = DB::update('UPDATE users SET points = points + ? WHERE id = ?', [$validatedData['quantity'] * $pointsPerItem, $userId]);

        if ($affected === 0) {
            return redirect()->back()->with('error', 'User not found or points not updated.');
        }

        // Create a new RecyclingItem record
        $validatedData['user_id'] = $userId; // Assign the user_id to the validated data
        RecyclingItem::create($validatedData);

        // Log the user's points
        $user = Auth::user();
        Log::info('User points updated: ' . $user->points);

        // Redirect back to the create page with success message
        return redirect()->route('recycle.create')->with('success', 'Recycling item created successfully and points updated.');
    }
}
