<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;




class DarkPan_theme extends Controller
{


    
    // Dashboard View
    function index(){
        return view('darkpan_theme.index');
    }

    //Login View
    function sign_in(){
        // if(Auth::check()){
        //     return redirect()->route('index');
        // }
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

    //Logout function 
    function logout(Request $request) {
        Auth::logout();
        return redirect()->route('Dark-Pan-theme.Sign_in');
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

    //Typography View
    function typography(){
        return view('darkpan_theme.typography');
    }

    //element view
    function element(){
        return view('darkpan_theme.element');
    }

    //Error_page View
    function error_page(){
        return view('darkpan_theme.404');
    }

    //Blank View
    function blank(){
        $cachedBlog = Redis::get('data');
        if(isset($cachedBlog)) {
            $blog = json_decode($cachedBlog, true);
            $this->data['data'] = $blog;
            
        }else {
            $response = Http::post('http://administration.prabhujipurefood.com/api/product-all', [
                "perpage"=> "50",
                "page"=> "1"
            ]);
            Redis::set('data',$response);
            $this->data['data'] = Redis::get('data');
        }
        return view('darkpan_theme.blank',$this->data);
    }
}
