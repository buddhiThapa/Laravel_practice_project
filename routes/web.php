<?php

use App\Http\Controllers\DarkPan_theme;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//**************************************Dark Pan Theme Route****************** */

Route::prefix('Dark-Pan-theme')->name('Dark-Pan-theme.')->group(function () {

    Route::controller(DarkPan_theme::class)->group(function(){

        Route::get('index','index')->name('index');//Dashboard View
        Route::get('Sign_in','sign_in')->name('Sign_in');//Login View
        Route::post('login','login')->name('login');//Login Function
        Route::get('Sign_up','sign_up')->name('Sign_up');//Registration View
        Route::get('button','button')->name('button');//Button View
        Route::get('chart','chart')->name('chart');//Chart View
        Route::get('table','table')->name('table');//Table View
        Route::get('forms','forms')->name('forms');//Form View
        Route::get('widget','widget')->name('widget');//Widget View

    });


});







Route::post('ajax_data',function(Request $request){
    if(!empty($request->all())){
        echo '<pre>';
        print_r($request->all());
        die;
    }
})->name('ajax_data');

Route::get('/', function () {
    return view('welcome');
});

