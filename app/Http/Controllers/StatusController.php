<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Status;


class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:1000',
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status')
        ]);

        return redirect('home');
    }

    public function postReply(Request $request, $statusID)
    {
        $this->validate($request, [
            "reply-$statusID" => 'required|max:1000',
        ],[
            'required' => 'the reply body is required'
        ]);

        $status = Status::notReply()->find($statusID);
        if (!$status) {
            return redirect('home');
        }

        if (!Auth::user()->isFriendWith($status->user)) {
            return redirect('home');
        }

        $reply = new Status(["body" => $request->input("reply-$statusID")]);
        $reply->user()->associate(Auth::user());

        $status->replies()->save($reply);
        
        return redirect('home');
    }
}
