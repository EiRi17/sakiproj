<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // SQL query to fetch user
        $user = DB::selectOne("SELECT * FROM users WHERE username = ? LIMIT 1", [$username]);

        if ($user && Hash::check($password, $user->password)) {
            Session::put('user', $user);
            return redirect()->route('userpage');
        }

        return back()->with('error', 'Invalid login credentials');
    }
}
