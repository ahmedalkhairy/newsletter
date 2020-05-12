<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\User;
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



Route::get('/logout', function () {

    auth()->logout();

    return back();
});


Route::middleware(['auth'])->group(function () {


    //for user profile
    Route::patch('users/profile', 'UserProfileController@update')->name('profile.update');

    Route::get('users/profile/edit', 'UserProfileController@edit')->name('profile.edit');

    Route::get('users/{user}/profile', 'UserProfileController@show')->name('profile.show');


    Route::middleware(['admin'])->namespace('Admin')->group(function () {

        Route::get('users/{user}/newsletters' , 'UserController@showNewsletters')->name('users.newsletters');

        Route::delete('users/{user}' , 'UserController@destroy')->name('users.destroy');

        Route::get('users/filter' , 'UserController@index')->name('users.index');

        Route::put('newsletters/{newsletter}/activate'   , 'NewsletterController@activate');

        Route::put('newsletters/{newsletter}/deactivate' ,'NewsletterController@deactivate');

        Route::get('newsletters/{newsletter}/mails' , 'NewsletterController@getMails')->name('newsletters.mails');

        Route::get('newsletters/{newsletter}/users' , 'NewsletterController@getUsers')->name('newsletters.users');

        Route::resource('newsletters', 'NewsletterController')->except('delete');


        Route::patch('newsletters/{newsletter}/active', ['uses' => 'NewsletterController@changeStatus', 'as' => 'newsletters.changeStatus']);

        Route::resource('mails', 'MailController');
        Route::post('mails/{id}/components', 'MailController@update_components')->name('mails.update.components');

        Route::resource('components', 'ComponentController');

        Route::resource('types', 'TypeController');
    });


    Route::middleware(['client'])->group(function () {


        Route::put('{newsletter}/subscribe', 'SubscribtionController@subscribe')->name('subscribe');

        Route::put('{newsletter}/unsubscribe', 'SubscribtionController@unsubscribe')->name('unsubscribe');

    });





});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/test' , function(){

//     $user = User::get()->first();

// $user->newsletters()->sync([
//     5=>[
//     'inscription'=>0
// ]
//  , 4 =>[
//      'inscription'=>0
//  ]
//  ]);

// $user->newsletters()->syncWithoutDetaching([10 , 12]);

// dd($user->newsletters->where('id' , 5)->first()->pivot->inscription);

// Newsletter::find(20)->users()->sync([1]);


// });
