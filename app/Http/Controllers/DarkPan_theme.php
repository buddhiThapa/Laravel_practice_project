<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DarkPan_theme extends Controller
{
    function index(){
        return view('darkpan_theme.index');
    }


    function sign_in(){
        return view('darkpan_theme.signin');
    }

    function login(request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('Dark-Pan-theme.index')->with('success','You have Successfully logged in');
        }
        return redirect()->back()->with('error','Oppes! You have entered invalid credentials');
    }

    function sign_up(){
        return view('darkpan_theme.signup');
    }

    function button(){
        return view('darkpan_theme.button');
    }
}
