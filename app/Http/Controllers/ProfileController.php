<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use Illuminate\Support\Facades\File;

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

    public function postDeleteProfile(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        
        if (Hash::check($request->password, Auth::user()->password)) {
            
            $user = Auth::user();
            Auth::logout();
            $user->delete();
            
            session()->flash('info', 'your account has been deleted!');
            redirect()->route('home');

        } else {

            session()->flash('error-alert', 'invalid password!');
            redirect()->back();
        
        }
    }

    public function postProfileEdit(Request $request)
    {
        $request->validate([
            'first_name' => 'max:50',
            'last_name' => 'max:50',
            'location' => 'max:50',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Auth::user()->fill($request->all());

        if ($request->avatar) {
            $oldProfilePic = Auth::user()->avatar;
            $avatarName = time(). '.' .request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatar', $avatarName);
    
            Auth::user()->avatar = $avatarName;
            
            $path = storage_path() . '/app/public/avatar/'.$oldProfilePic;
            if(File::exists($path)) {
                unlink($path);
            }
        }
        
        Auth::user()->update();

        session()->flash('info', 'Your profile has been updated.');
        return redirect()->route('profile.get.edit');
    }
}
