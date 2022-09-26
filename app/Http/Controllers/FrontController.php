<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index(){
        return view('food-funday.index');
    }

    function proMan_index(){
        return view('proman.index');
    }
}
