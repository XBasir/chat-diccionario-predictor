<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
Route::resource('dashboard','DashboardController');
Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('dictionary','DictionaryController');

});

Route::group(['middleware' => ['role:user']], function() {
Route::resource('dashboard','DashboardController');
});

 Route::view('messages_table', 'partials.messages', [
      'data' => App\Message::orderBy('created_at', 'desc')->take(20)->get()
    ]);

Route::resource('messages','MessageController');
Route::post('saveMessage', 'MessageController@saveMessage');