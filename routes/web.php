<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'admin']], function() {
    /////////   BACKGROUND ROUTE
    Route::get('background', 'BackgroundController@index')->name('background');

    Route::post('/save-background', 'BackgroundController@store')->name('save-background');

    Route::get('/edit-background/{background}', 'BackgroundController@edit')->name('edit-background');

    Route::patch('/update-background/{background}', 'BackgroundController@update')->name('update-background');

    Route::get('/delete-background/{background}', 'BackgroundController@destroy')->name('delete-background');
        //Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


        ////////    MEDIA ROUTE
    Route::get('/media', 'MediaController@index')->name('media');

    Route::post('/save-media', 'MediaController@store')->name('save-media');

    Route::get('/edit-media/{media}', 'MediaController@edit')->name('edit-media');

    Route::patch('/update-media/{media}', 'MediaController@update')->name('update-media');

    Route::get('/delete-media/{media}', 'MediaController@delete')->name('delete-media');


    /////////// NEWS CONTENT
    Route::get('/banner', 'BannerController@index')->name('banner');

    Route::post('/save-banner', 'BannerController@store')->name('save-banner');

    Route::get('/edit-banner/{banner}', 'BannerController@edit')->name('edit-banner');

    Route::patch('/update-banner/{banner}', 'BannerController@update')->name('update-banner');

    Route::get('/delete-banner/{banner}', 'BannerController@delete')->name('delete-banner');


    /////////// NEWS CONTENT
    Route::get('/news', 'NewsController@index')->name('news');

    Route::post('/save-news', 'NewsController@store')->name('save-news');

    Route::get('/edit-news/{news}', 'NewsController@edit')->name('edit-news');

    Route::patch('/update-news/{news}', 'NewsController@update')->name('update-news');

    Route::get('/delete-news/{news}', 'NewsController@delete')->name('delete-news');


});


Route::group(['middleware' => ['auth', 'author']], function() {

    Route::get('/about', 'AboutController@index')->name('about');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
