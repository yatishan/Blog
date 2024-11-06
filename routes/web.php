<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'homePage'])->name("homePage");

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::get('/post_page',[AdminController::class,'post_page'])->name('post_page');
Route::post('/post_add',[AdminController::class,'post_add'])->name('post_add');
Route::get('/show_page',[AdminController::class,'show_page'])->name('show_page');
Route::get('/delete_page/{id}',[AdminController::class,'delete_page'])->name('delete_page');
Route::get('/edit_page/{id}',[AdminController::class,'edit_page'])->name('edit_page');
Route::put('/update_page/{id}',[AdminController::class,'update_page'])->name('update_page');



