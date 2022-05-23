<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    
Route::get('/users/{user:username}/post', [UserPostController::class, 'index'])->name('users.post');

Route::get('/users/{user:name}/profile', [UserController::class, 'profile'])->name('users.profile');
Route::post('/users/{user:name}/profile/update', [UserController::class, 'edit'])->name('user.profile.update');

Route::get('/users/{user:name}/transactions', [TransactionController::class, 'transaction'])->name('transactions.user');
Route::get('/users/{user:name}/transhistory', [TransactionController::class, 'tranhistory'])->name('transhistory.user');
Route::post('/posts/{post}/transactions', [TransactionController::class, 'store'])->name('posts.transactions');
Route::delete('/posts/{post}/transactions', [TransactionController::class, 'destroy'])->name('posts.transactions');
Route::get('/users/{name}/bought', [TransactionController::class, 'bought'])->name('transactions.bought');
Route::get('/users/{name}/sold', [TransactionController::class, 'sold'])->name('transactions.sold');

Route::post('/transactions/sell',[TransactionController::class, 'sell'])->name('transactions.sell');
Route::post('/transactions/buy',[TransactionController::class, 'buy'])->name('transactions.buy');

Route::get('/transactions/messages',[MessageController::class, 'message'])->name('messages');
Route::post('/transactions/messages',[MessageController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts/books', [PostController::class, 'books'])->name('posts.books');
Route::get('/posts/materials', [PostController::class, 'materials'])->name('posts.materials');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);

//Route::post('/posts', [PostController::class, 'edit'])->name('posts.testedit');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

