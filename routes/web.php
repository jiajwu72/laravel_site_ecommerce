<?php

//use \app\Category_post;

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

  
Route::get('logout','Auth\LogoutController@getLogout');

// Page route
Route::get('contact', 'PageController@getContact');
Route::post('contact', 'PageController@postContact');
Route::get('about', 'PageController@getAbout');
Route::get('/', 'PageController@getIndex')->name('index');

// Post route
Route::resource('posts', 'PostController');
Route::resource('comment', 'CommentController');

// Auth route
Auth::routes();

// Profil/Administration route
Route::resource('profil', 'ProfilController');
Route::resource('administration', 'AdministrationController');


//Pannier Route
Route::resource('pannier', 'PannierController');





//Outil Route
Route::post('pass', 'SendPassController@sendResetLinkEmail')->name('sendPass');

Route::post('search', 'SearchController@store')->name('search.store');
/*
Route::get('search/{posts}', function($posts){
    echo 'hi';
})->name('search.show');
*/

Route::get('search/{posts}', 'SearchController@show')->name('search.show');