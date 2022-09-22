<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DarkPan_theme extends Controller
{

    // Dashboard View
    function index(){
        return view('darkpan_theme.index');
    }

    //Login View
    function sign_in(){
        return view('darkpan_theme.signin');
    }

    //Login Function
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

    //Registration View
    function sign_up(){
        return view('darkpan_theme.signup');
    }

    //Button View
    function button(){
        return view('darkpan_theme.button');
    }

    //Chart View
    function chart(){
        return view('darkpan_theme.chart');
    }

    //Table View 
    function table(){
        return view('darkpan_theme.table');
    }

    //Form View
    function forms(){
        return view('darkpan_theme.form');
    }

    //Widget View
    function widget(){
        return view('darkpan_theme.widget');
    }
}