<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use libPhoneNumber\PhoneNumberUtil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use libPhoneNumber\NumberParseException;
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
        //dd($request);
        /*      [
      "name" => "user 77"
      "phone" => "0900909"
      "email" => "user9999@email.com"
      "password" => "12345678"
    ]
  
  */
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);


        $phoneNumber = $request->phone;

        $userPhone = '';

        // $phoneUtil = PhoneNumberUtil::getInstance();
        // try {
        //     $parsedNumber = $phoneUtil->parse($phoneNumber, null);
        //     if ($phoneUtil->isValidNumber($parsedNumber)) {
        //         // Valid phone number
        //         $userPhone = $parsedNumber;
        //     } else {
        //         // Invalid phone number
        //     }
        // } catch (NumberParseException $e) {
        //     // Invalid phone number format
        // }

        
        $user = User::create([
            'name' => $request->name,
            //'phone' => $userPhone,
            'phone' => $phoneNumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            //'role' => 'customer',
        ]);

        var_dump($user);

        //Auth::login($user);

        $token = $user->createToken('authToken')->plainTextToken;


        //return redirect('/');
        return response()->json([
            'message' => 'Registration successful',
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    public function showLogin()
    {
        return view('login');
    }

    public function checkAuth(Request $request) {
       if (Auth::check()) {
        return response()->json(['authenticated' => true]);
       } 
       return response()->json(['authenticated' => false]);
    }
    // Handle the login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();
        // dd([
        //     'request password' => $credentials['password'],
        //     'db password' => $user->password,
        //     'check' => Hash::check($credentials['password'], $user->password),
        //     //'check user_one@user.com' => Hash::check('12345678', '$2y$12$okaD3FBEZIyqCTjKAFBeaeX19nrTIVT/Kqv3a8xnvW7M7qUmbVjGu'),
        //     //'check user9999@email.com' => Hash::check('12345678', '$2y$12$cGqS.2zU0h0FpC8o2yb.Luxm2cVLGeFvDjqJQMOPyoEcMjIFLNRJq'),
        // ]);
        if ($user && Hash::check($credentials['password'], $user->password)) {
            //dd(Auth::user());
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            // Authentication passed...
            //return redirect('/index'); // Redirect to a protected page after login
            return response()->json([
            'token' => $token,
            'message' => 'Registration successful',
            'user' => $user,
        ], 200);
        } else {
            return response()->json(['message' => 'unauthorized']);
        }

        // Authentication failed...
        return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }
}
