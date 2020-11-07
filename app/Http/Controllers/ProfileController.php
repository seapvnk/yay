<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            abort(404);
        }
        
        return view('profile.index')
            ->with('user', $user);
    }

    public function getProfileEdit()
    {
        return view('profile.edit');
    }

    public function postProfileEdit(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'location' => 'max:50',
        ]);

        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'location' => $request->input('location'),
            'avatar_seed' => $request->input('avatar_seed')?? md5(Auth::user()->email),
        ]);

        return redirect('/profile/edit')->withInfo('Your profile has been updated.');
    }
}
