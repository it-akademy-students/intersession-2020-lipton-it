<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\ConfirmationMail;
use App\Mail\ResultsMail;
use App\Mail\ErrorMail;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/confirmationMail', function () {
//    Mail::to('example@example.com')
//        ->queue(new ConfirmationMail());

    return new ConfirmationMail();
});
Route::get('/resultsMail', function () {
//        Mail::to('example@example.com')
//        ->queue(new ResultsMail());

    return new ResultsMail();
});
Route::get('/errorMail', function () {
//        Mail::to('example@example.com')
//        ->queue(new ErrorMail());

    return new ErrorMail();
});

Auth::routes(['register' => false]);
Route::get('/admin', 'AdminController@index')->name('admin');