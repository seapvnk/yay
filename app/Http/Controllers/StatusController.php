<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Status;


class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        $request->validate(['status' => 'required|max:1000']);

        Auth::user()->statuses()->create([
            'body' => $request->input('status')
        ]);

        return redirect()->route('home');
    }

    public function postReply(Request $request, $statusID)
    {

        $this->validate($request, [
            "reply-$statusID" => 'required|max:1000',
        ], [
            'required' => 'The reply body is required!'
        ]);

        $status = Status::notReply()->find($statusID);

        if (!$status) {
            session()->flash('error-alert', "This status no longer exists!");
            return redirect()->back();
        }

        if (!Auth::user()->isFriendWith($status->user)) {
            session()->flash('error-alert', "You can only reply your friends!");
            return redirect()->back();
        }

        $reply = new Status();
        $reply->body = $request->input("reply-$statusID");

        $reply->user()->associate(Auth::user());
        $status->replies()->save($reply);
        
        return redirect()->back();
    }

    public function getLike($statusID)
    {
        $status = Status::find($statusID);

        if (!$status) {
            session()->flash('error-alert', "This status no longer exists!");
            return redirect()->route('home');
        }

        if (Auth::user()->hasLikedStatus($status)) {
            session()->flash('error-alert', "You already liked it!");
            return redirect()->back();
        }

        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }
}
