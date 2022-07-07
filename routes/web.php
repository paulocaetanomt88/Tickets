<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/novo-ticket', [App\Http\Controllers\TicketsController::class, 'create'])->name('novo-ticket');
Route::post('/novo-ticket', [App\Http\Controllers\TicketsController::class, 'store'])->name('armazena-ticket');
Route::get('/meus-tickets', [App\Http\Controllers\TicketsController::class, 'userTickets'])->name('meus-tickets');
Route::get('/tickets/{ticket_id}', [App\Http\Controllers\TicketsController::class, 'show'])->name('ver-detalhes');
Route::post('/comment', [App\Http\Controllers\CommentsController::class, 'postComment'])->name('comment');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/tickets', [App\Http\Controllers\TicketsController::class, 'index'])->name('tickets');
    Route::post('/fechar_ticket/{ticket_id}', [App\Http\Controllers\TicketsController::class, 'close']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
