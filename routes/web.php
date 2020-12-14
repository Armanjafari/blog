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

Route::get('/', function () {
    $postha = post::All();
    dd($postha);
    return view("welcome");
});
Route::post('index/',  [blog::class , 'index']);

Route::get('create/',  [blog::class , 'create']);
Route::get('index/', function () {
    return view("index");
});

