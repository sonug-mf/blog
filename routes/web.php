<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/article/{slug}', [ArticleController::class, 'show']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});


Route::middleware('auth.basic')->group(function(){
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect(Route('login'));
})->name('logout');
