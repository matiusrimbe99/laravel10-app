<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hello', [HelloController::class, 'index']);
// Route::get('message', [HelloController::class, 'message']);
// Route::get('hello', function () {
//     echo "Hello World";
// });
// Route::get('hello', function () {
//     return view('hello');
// });

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::get('posts/{post}', [PostController::class, 'show']);
Route::patch('posts/{post}', [PostController::class, 'update']);
Route::get('posts/{post}/edit', [PostController::class, 'edit']);
Route::post('posts', [PostController::class, 'store']);
Route::delete('posts/{post}', [PostController::class, 'destroy']);
