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

Route::post('/',  [blog::class , 'index']);
Route::get('/',  [blog::class , 'getindex']);
Route::get('create/',  [blog::class , 'create']);
Route::get('edit/{id}', [blog::class , 'edit']);
Route::put('edit/{id}', [blog::class , 'postedit']);
Route::get('all/',  [blog::class , 'all']);
Route::delete('all/delete/{id}',  [blog::class , 'delete']);




