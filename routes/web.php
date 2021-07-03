<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\BlogsController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/blog/create', [App\Http\Controllers\BlogsController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [App\Http\Controllers\BlogsController::class, 'store'])->name('blog.store');
    Route::get('/blog/delete/{id}', [App\Http\Controllers\BlogsController::class, 'destroy'])->name('blog.destroy');
});
