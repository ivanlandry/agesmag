<?php

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/annonce', 'AllPostController@index')->name('annonce');
Route::get('annonce/{post}', 'AllPostController@show')->name('showPost');


Route::post('message','MessageController@sendEmail')->name("message_email");

Route::resource('post', 'PostController');

Route::resource('contact', 'ContactController');

Route::middleware(['auth', 'IsAdmin'])->namespace('Admin')->prefix('admin')->group(function () {

    Route::resource('categorie', 'CategoriePostController');
    Route::resource('user', 'UserController');
    Route::get('/', 'HomeController@index');
    Route::get('valider/{post}/{user_id}','PostActionController@valider')->name('valider');
    Route::get('rejeter/{post}/{user_id}','PostActionController@rejeter')->name('rejeter');
});
