<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FriendsController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $friendRequests = Auth::user()->friendRequests();
        
        return view('friends.index')
            ->with('friends', $friends)
            ->with('requests', $friendRequests);
    }

    public function getAdd(string $username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            return redirect('home')->withInfo('That user could not be found');
        }

        if (Auth::user()->hasFriendRequestPending($user) || 
            $user->hasFriendRequestPending(Auth::user())) {
            return redirect("user/{$user->username}")->withInfo('Friend request already pending.');
        }

        if (Auth::user()->isFriendWith($user)) {
            return redirect("user/{$user->username}")->withInfo('You are already friends.');
        }

        Auth::user()->addFriend($user);
        return redirect("user/{$user->username}")->withInfo('Friend request sent.');

    }

    public function getAccept($username)
    {
        if ($username === Auth::user()->username)
        {
            return redirect('home');
        }

        $user = User::where('username', $username)->first();
        if (!$user) {
            return redirect('home')->withInfo('That user could not be found');
        }

        if (!Auth::user()->hasFriendRequestReceived($user)) {
            return redirect('home');
        }

        Auth::user()->acceptFriendRequest($user);
        $userProfile = "user/" . Auth::user()->username;
        return redirect($userProfile)->withInfo($userProfile);
    }

    public function getRemoveFriend($username)
    {   
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect('home');
        }

        if (!Auth::user()->isFriendWith($user)) {
            return redirect()->back();
        }

        Auth::user()->deleteFriend($user);
        return redirect()->back()->withInfo('Friend deleted.');
        
    }
}
