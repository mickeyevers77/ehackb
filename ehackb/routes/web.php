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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/news/{news}', 'HomeController@show');
Route::get('/schedule/{event}', 'ScheduleController@show');
Route::get('/schedule', 'ScheduleController@index');
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@update');
Route::post('/subscribe', 'HomeController@subscribe');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('news', 'Admin\NewsController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('events', 'Admin\EventController');
    Route::resource('sponsors', 'Admin\SponsorController');

    Route::get('/events/{event}/enroll', 'Admin\EventController@enroll')->name('events.enroll');
    Route::get('/events/{event}/cancel', 'Admin\EventController@cancel')->name('events.cancel');
});
