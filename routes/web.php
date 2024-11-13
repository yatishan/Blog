<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'homePage'])->name("homePage");

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//admin
Route::get('/post_page',[AdminController::class,'post_page'])->name('post_page');
Route::post('/post_add',[AdminController::class,'post_add'])->name('post_add');
Route::get('/show_page',[AdminController::class,'show_page'])->name('show_page');
Route::get('/delete_page/{id}',[AdminController::class,'delete_page'])->name('delete_page');
Route::get('/edit_page/{id}',[AdminController::class,'edit_page'])->name('edit_page');
Route::put('/update_page/{id}',[AdminController::class,'update_page'])->name('update_page');
Route::get('/accept_page/{id}',[AdminController::class,'accept_page'])->name('accept_page');
Route::get('/reject_page/{id}',[AdminController::class,'reject_page'])->name('reject_page');

//normal user
Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('/page_details/{id}',[HomeController::class,'page_details'])->name('page_details');
Route::get('/create_post',[HomeController::class,'create_post'])->middleware('auth')->name('create_post');
Route::post('/add_post',[HomeController::class,'add_post'])->middleware('auth')->name('add_post');
Route::get('/my_post',[HomeController::class,'my_post'])->middleware('auth')->name('my_post');
Route::get('/my_post_del/{id}',[HomeController::class,'my_post_del'])->middleware('auth')->name('my_post_del');
Route::get('/my_post_update/{id}',[HomeController::class,'my_post_update'])->middleware('auth')->name('my_post_update');
Route::post('/my_post_edit/{id}',[HomeController::class,'my_post_edit'])->middleware('auth')->name('my_post_edit');








