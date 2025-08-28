<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Clear session
        $request->session()->flush();

        // Or if you use Auth:
        // Auth::logout();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
