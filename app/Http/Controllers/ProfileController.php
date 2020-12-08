<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;


class ProfileController extends Controller
{
    public function getProfile($username)
    {

        $user = User::where('username', $username)->firstOrFail();

        $statuses = Status::notReply()->where(function ($query) use ($user) {
            return $query->where('user_id', $user->id);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        
        return view('profile.index', [
            'user' => $user,
            'statuses' => $statuses
        ]);
    }

    public function getProfileEdit()
    {
        return view('profile.edit');
    }

    public function postProfileEdit(Request $request)
    {
        $request->validate([
            'first_name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'location' => 'max:50',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Auth::user()->fill($request->all());
        
        $avatarName = time(). '.' .request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatar', $avatarName);

        Auth::user()->avatar = $avatarName;
        Auth::user()->update();

        session()->flash('info', 'Your profile has been updated.');
        return redirect()->route('profile.get.edit');
    }
}
