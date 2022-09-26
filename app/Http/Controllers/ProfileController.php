<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //Profile View
    function profile(){
        $user_check = User::find(auth()->user()->id);
        if($user_check->count() > 0 ){
            $this->data['user'] = $user_check->first()->toArray();
        }
        return view('admin.Profile',$this->data);   
    }
}
