<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    //

    public function show() {
        $users = User::orderBy('points', 'desc')->get();

        // Get authenticated user's rank
        $loggedInUser = Auth::user();
        $loggedInUserRank = User::where('points', '>', $loggedInUser->points)->count() + 1;
        return view('pages.leaderboard', compact('users', 'loggedInUser', 'loggedInUserRank'));
    }
}
