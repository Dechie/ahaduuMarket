<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(){
         
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            
        ]);

        ($attributes);
        $attributes['role'] = 'admin';

        $pass = $attributes['password']; 
        $pass = Hash::make($pass);
        $attributes['password'] = $pass;


        $user = User::create($attributes);
        //auth()->login($user);
        
        return redirect('/admin-dashboard');
    } 
}
