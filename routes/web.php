<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('welcome');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/accueil', [App\Http\Controllers\HomeController::class, 'accueille'])->name('accueille');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'reche'])->name('search');

Route::get('/readMail/{message}', [App\Http\Controllers\MailController::class, 'readMail'])->name('readMail');

Route::get('composeMail', [App\Http\Controllers\MailController::class, 'composeMail'])->name('composeMail');

Route::get('/inboxMail', [App\Http\Controllers\MailController::class, 'inboxMail'])->name('inboxMail');

Route::get('/profil', [App\Http\Controllers\HomeController::class, 'profil'])->name('profil');

Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');

Route::post('/modifier/profil', [App\Http\Controllers\ProfilController::class, 'modifier_profil'])->name('modifier_profil');

Route::post('/publication/store', [App\Http\Controllers\PublicationController::class, 'store'])->name('publication.store');

Route::post('/commentaire/store', [CommentaireController::class, 'storeComment'])->name('commentaire.store');

Route::post('/message/store', [MessageController::class, 'sendMessage'])->name('message.store');


