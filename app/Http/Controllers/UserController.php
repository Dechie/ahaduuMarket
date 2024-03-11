<?php

namespace App\Http\Controllers;

use libPhoneNumber\PhoneNumberUtil;
use libPhoneNumber\NumberParseException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Symfony\Component\Console\Logger\ConsoleLogger;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);


        $phoneNumber = $request->phone;

        $userPhone = '';

        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $parsedNumber = $phoneUtil->parse($phoneNumber, null);
            if ($phoneUtil->isValidNumber($parsedNumber)) {
                // Valid phone number
                $userPhone = $parsedNumber;
            } else {
                // Invalid phone number
            }
        } catch (NumberParseException $e) {
            // Invalid phone number format
        }

        $user = User::create([
            'name' => $request->name,
            //'phone' => $userPhone,
            'phone' => $userPhone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        
        return redirect('/');
        //return response()->json(['message' => 'Registration successful'], 200);

    }

    public function showLogin()
    {
        return view('login');
    }

    // Handle the login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/index'); // Redirect to a protected page after login
        }

        // Authentication failed...
        return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
}

