<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect('home');
        }
        
        $fullNameRawSQLQuery = DB::raw("CONCAT(first_name, ' ' , last_name)");
        $users = User::where($fullNameRawSQLQuery, 'LIKE', "%{$query}%")
                    ->orWhere('username', 'LIKE', "%{$query}%")
                    ->get();

        return view('search.results')->with('users', $users);
    }
}
