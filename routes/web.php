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

Route::get('create/', [blog::class, 'create'])->name("create");
Route::get('edit/{post}', [blog::class, 'edit'])->name("edit");
Route::put('edit/{post}', [blog::class, 'postedit'])->name("postedit");
Route::get('all/', [blog::class, 'all'])->name("all");
Route::delete('all/delete/{post}', [blog::class, 'delete'])->name("delete");

});
Route::get('code/', [blog::class, 'code'])->name("code");
Route::get('loginwithcode/', [blog::class, 'loginwithcode'])->name("loginwithcode");
Route::post('verifycode/', [blog::class, 'verifycode'])->name("verifycode");
//Route::get('loginemail/', [, 'loginemail'])->name("loginemail");
Route::get('searchbyuser/{email}', [blog::class, 'search'])->name("search");
Route::get('searchbytag/{tag}', [blog::class, 'searchtag'])->name("searchtag");
Route::get('searchbycategory/{cat}', [blog::class, 'category'])->name("category");
Route::get('show/{id}', [blog::class, 'showarticle'])->name("showarticle");
Route::post('/',  [blog::class , 'index']);
Route::get('/',  [blog::class , 'getindex']);
Route::get('/email',  [blog::class , 'emailsend']);
Auth::routes();
Route::get('auth/google', [\App\Http\Controllers\Auth\LoginController::class, 'google'])->name("google");
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'googlecallback']);

