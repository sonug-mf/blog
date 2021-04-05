<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::middleware('auth.basic')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    //delete route
    Route::delete('article/delete/{id}', function($id = 0){
        Article::destroy($id);
        return redirect(Route('article.list'));
    })->name('article.delete');

    Route::get('/article/list', [ArticleController::class, 'list'])->name('article.list');

    Route::get('/article/create/{id?}', [ArticleController::class, 'create'])->name('article.create');
    
    Route::post('/article/submit', [ArticleController::class, 'submit'])->name('article.post');

    Route::put('/article/submit/{id}', [ArticleController::class, 'edit']);

    //category route
    Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/categories/list', [CategoryController::class, 'list'])->name('category.list');

    Route::get('/categories/create/{id?}', [CategoryController::class, 'create'])->name('category.create');
    
    Route::post('/categories/submit', [CategoryController::class, 'submit'])->name('category.post');

    Route::put('/categories/submit', [CategoryController::class, 'edit']);

    //users registration route
    Route::get('/users/registration', [UserController::class, 'register'])->name('users.register');
    Route::post('/users/registration', [UserController::class, 'store']);
    
    Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
    

});

Route::get('/article/{slug}', [ArticleController::class, 'show']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect(Route('login'));
})->name('logout');
