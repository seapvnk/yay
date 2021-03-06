<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Status;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $statuses = Status::notReply()->where(function ($query) {
                return $query
                    ->where('user_id', Auth::user()->id)
                    ->where('created_at', '>=', Carbon::yesterday())
                    ->orWhereIn('user_id', Auth::user()->friends());
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);


            return view('timeline.index')->with('statuses', $statuses);
        } else {
            return view('home');
        }
    }
}
