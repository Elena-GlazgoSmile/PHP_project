<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {return 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';});
Route::get('/welcome', [Controller::class, 'index'])->name('welcome.index');

Route::get('/posts', [PostController::class,'index'])->name('post.index');

Route::get('/main', [MainController::class,'index'])->name('main.index');
Route::get('/contacts', [ContactController::class,'index'])->name('contacts.index');
Route::get('/about', [AboutController::class,'index'])->name('about.index');


Route::get('/posts/create', [PostController::class,'create'])->name('post.create');
Route::post('/posts', [PostController::class,'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class,'show'])->name('post.show');
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostController::class,'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('post.delete');

Route::get('/posts/update', [PostController::class,'update']);
Route::get('/posts/delete', [PostController::class,'delete']);

Route::get('/posts/first_or_create', [PostController::class,'firstOrCreate']);

Route::get('/posts/update_or_create', [PostController::class,'updateOrCreate']);

Route::get('/second_page', [SecondController::class,'index']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/mobile_menu', function () { return view('mobile_menu'); })->name('mobile_menu');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile/profile');
Route::get('/friends', [FriendsController::class, 'index'])->name('friends');
Route::get('/chats', [ChatController::class, 'index'])->name('chats');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
