<?php

use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Http\Controllers\blog;
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
Route::prefix("")->middleware('auth')->group(function (){

Route::get('create/', [blog::class, 'create']);
Route::get('edit/{post}', [blog::class, 'edit']);
Route::put('edit/{post}', [blog::class, 'postedit']);
Route::get('all/', [blog::class, 'all']);
Route::delete('all/delete/{post}', [blog::class, 'delete']);
});

Route::post('/',  [blog::class , 'index']);
Route::get('/',  [blog::class , 'getindex']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
