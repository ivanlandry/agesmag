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

Route::get('categorie/{categorie}', 'AllPostController@all_post_categorie')->name('annonce_categorie');

Route::get('annonce/{post}', 'AllPostController@show')->name('showPost');

Route::get('mes-annonces/', 'MonCompteController@mes_annonces')->name('mes-annonces');

Route::get('parametres/', 'MonCompteController@parametre')->name('parametres');

Route::get('messages/', 'MonCompteController@messages')->name('messages');

Route::get('show_chat/{destinataire}', 'MonCompteController@show_chat')->name('show_chat');

Route::post('send_message', 'MonCompteController@send_message')->name('send_message');

Route::post('modif_infos', 'MonCompteController@modif_infos')->name('modif_infos');

Route::post('modif_password', 'MonCompteController@pmodif_password')->name('modif_password');

Route::get('/paiment', 'MonCompteController@paiement')->name('paiement');

Route::post('message', 'MessageController@sendEmail')->name("message_email");
Route::post('chat_message', 'MessageController@chat_message')->name('chat_message');



Route::get('search/', 'SearchController')->name('search');

Route::resource('post', 'PostController');

Route::resource('contact', 'ContactController');

Route::middleware(['auth', 'IsAdmin'])->namespace('Admin')->prefix('admin')->group(function () {

    Route::resource('categorie', 'CategorieController');
    Route::resource('user', 'UserController');
    Route::get('dashboard/', 'HomeController@index')->name('dashboard');
    Route::get('valider/{post}/{user_id}', 'PostActionController@valider')->name('valider');
    Route::get('rejeter/{post}/{user_id}', 'PostActionController@rejeter')->name('rejeter');
});
