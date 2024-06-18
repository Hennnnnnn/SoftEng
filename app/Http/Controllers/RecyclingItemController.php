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

        try {
            // Begin a database transaction
            DB::beginTransaction();

            // Retrieve the authenticated User instance
            $user = Auth::user();

            // Update user points
            $user->points += $validatedData['quantity'] * $pointsPerItem;
            $user->save();

            // Create a new RecyclingItem record and associate it with the authenticated user
            $recyclingItem = new RecyclingItem();
            $recyclingItem->type = $validatedData['type'];
            $recyclingItem->quantity = $validatedData['quantity'];
            $recyclingItem->pick_up_address = $validatedData['pick_up_address'];
            $recyclingItem->pick_up_date = $validatedData['pick_up_date'];
            $recyclingItem->telephone_number = $validatedData['telephone_number'];
            $recyclingItem->user_id = $user->id; // Assign the authenticated user's ID
            $recyclingItem->save();

            // Commit the transaction
            DB::commit();

            // Log the user's points
            Log::info('User points updated: ' . $user->points);

            // Redirect back to the create page with success message
            return redirect()->route('recycle.create')->with('success', 'Recycling item created successfully and points updated.');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollBack();

            // Log the error
            Log::error('Error storing recycling item: ' . $e->getMessage());

            // Redirect back to the create page with error message
            return redirect()->back()->with('error', 'Failed to store recycling item. Please try again.');
        }
    }
}
