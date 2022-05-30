<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/Consultancy', function () {
    return view('Consultancy');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/HireTractor', function () {
    return view('HireTractor');
});

Route::get('/ScratchCard', function () {
    return view('ScratchCard');
});

Route::get('/policy', function () {
    return view('policy');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/tracking', function () {
    return view('tracking');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/reports', function () {
        return view('reports.index');
    })->name('user.reports');

    Route::get('/orders', function () {
        return view('orders.index');
    })->name('user.orders');

    Route::post('user/register', 'App\Http\Controllers\Admin\FarmerController@register')->name('user.register');

    Route::post('/reports/cards', 'App\Http\Controllers\UserReports@cards')->name('user.reports.cards');
    Route::post('/reports/debits', 'App\Http\Controllers\UserReports@debits')->name('user.reports.debits');
    Route::post('/charge-card', 'App\Http\Controllers\UserCards@charge')->name('user.charge_card');
});

Route::get('send-mail','MailSend@mailsend');


require 'admin.php';

