<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\DarkPan_theme;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
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

    //DarkPan Them controller

    Route::controller(DarkPan_theme::class)->group(function(){

        Route::middleware('login_check')->group(function(){
            Route::get('Sign_in','sign_in')->name('Sign_in');//Login View
            Route::get('Sign_up','sign_up')->name('Sign_up');//Registration View
        });
        
        Route::middleware('auth')->group(function(){
            Route::get('index','index')->name('index');//Dashboard View
            Route::get('button','button')->name('button');//Button View
            Route::get('chart','chart')->name('chart');//Chart View
            Route::get('table','table')->name('table');//Table View
            Route::get('forms','forms')->name('forms');//Form View
            Route::get('widget','widget')->name('widget');//Widget View
            Route::get('typography','typography')->name('typography');//Typography View
            Route::get('element','element')->name('element');//Element View
            Route::get('error_page','error_page')->name('error_page');//Error_page View
            Route::get('blank','blank')->name('blank');//Blank View
        });
        
        Route::post('login','login')->name('login');//Login Function
        Route::get('logout','logout')->name('logout');//Logout Function

    });//Dark Pan Controller End

    //Profile Controller

    Route::controller(ProfileController::class)->middleware('auth')->group(function(){

        Route::get('profile','profile')->name('profile');//Profile View

    });//Profile Controller End

    //User Controller
    Route::resource('user', UserController::class);
    Route::post('user_export',[UserController::class, 'get_user_data'])->name('user.export');
    Route::post('user_import',[UserController::class,'import'])->name('user.import');

});//Dark Pan Theme end

//**************************************Dark Pan Theme Route End ****************** */



Route::get('/Front',[FrontController::class,'index'])->name('front');
Route::get('/Portfolio',[FrontController::class,'proMan_index'])->name('Portfolio');


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

