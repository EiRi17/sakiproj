<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str; // for random password
use App\Notifications\Password;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|string|email|max:255|unique:users,email',
        ]);

        $fullname = $request->input('fullname');
        $username = $request->input('username');
        $email    = $request->input('email');

        // Auto-generate random 6-character password
        $plainPassword = Str::random(6);

        // Hash before saving
        $password = Hash::make($plainPassword);

        // Insert into users table
        DB::insert(
            "INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)",
            [$fullname, $username, $email, $password]
        );

        // Mail Data (send the generated password in "wish")
        $mailData = [
            "name" => $fullname,
            "username" => $username,
            "wish" => "Your temporary password is: " . $plainPassword
        ];

        // Send Notification
        Notification::route('mail', $email)->notify(new Password($mailData));

        return redirect()->back()->with('success', 'Registration successful! Check your email for your password.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('users')->where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return view('userpage', ['user' => $user]);
        }

        return redirect()->back()->with('error', 'Invalid login credentials.');
    }
}
