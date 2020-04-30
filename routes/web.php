<?php

use App\Mail;
use App\Newsletter;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/logout' , function(){
      
    auth()->logout(); 
    
    return back();
});


Route::middleware(['auth' , 'admin'])->namespace('Admin')->group(function () {

    Route::resource('newsletters', 'NewsletterController')->except('delete');

    Route::patch('newsletters/{newsletter}/active' , ['uses'=>'NewsletterController@changeStatus' ,'as'=>'newsletters.changeStatus']);
    
    Route::resource('mails', 'MailController');
    
    Route::resource('components', 'ComponentController');
    
    Route::resource('types', 'TypeController');

});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
