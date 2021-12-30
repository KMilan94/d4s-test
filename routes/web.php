<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;

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
    $blogs = app(\App\Http\Controllers\ApiController::class)->getBlogs();
    return view('home', compact('blogs'));
});
Route::post('/create', [ApiController::class, 'insertBlog']);
Route::delete('/delete', [ApiController::class, 'deleteBlog']);
Route::post('/update', [ApiController::class, 'updateBlog']);
