<?php

use Illuminate\Support\Facades\Route;




use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthenController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CountrieController;
use App\Http\Controllers\admin\DirectorController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;

use App\Http\Controllers\User\UserController;



//Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
//Login-Logout User
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postlogin'])->name('postlogin');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'postRegister']);
Route::get('/logoutuser', [UserController::class, 'logoutuser'])->name('logoutuser');


Route::prefix('admin')->middleware('checkAdmin')->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('indexDashboard');
    });

    Route::get('/', [AuthenController::class, 'formLogin'])->name('formLogin')->withoutMiddleware('checkAdmin');
    Route::post('postLogin', [AuthenController::class, 'postLogin'])->name('postLogin')->withoutMiddleware('checkAdmin');
    Route::get('logout', [AuthenController::class, 'logout'])->name('logout');

    Route::get('fogot-pass', [AuthenController::class, 'forgotPass'])->name('forgotPass')->withoutMiddleware('checkAdmin');
    Route::post('fogot-pass', [AuthenController::class, 'forgotPassPost'])->name('forgotPassPost')->withoutMiddleware('checkAdmin');

    Route::get('reset-pass/{token}', [AuthenController::class, 'resetPass'])->name('resetPass')->withoutMiddleware('checkAdmin');
    Route::post('reset-pass', [AuthenController::class, 'resetPostPass'])->name('resetPostPass')->withoutMiddleware('checkAdmin');


    Route::prefix('countrie')->name('countrie.')->group(function () {
        Route::get('/', [CountrieController::class, 'listCountrie'])->name('listCountrie');
        Route::post('add-countrie', [CountrieController::class, 'addCountrie'])->name('addCountrie');
        Route::delete('delete-countrie', [CountrieController::class, 'deleteCountrie'])->name('deleteCountrie');
        Route::get('detail-countrie', [CountrieController::class, 'detailCountrie'])->name('detailCountrie');
        Route::patch('update-countrie', [CountrieController::class, 'updateCountrie'])->name('updateCountrie');
    });

    Route::prefix('movie')->name('movie.')->group(function () {
        Route::resource('catalog', MovieController::class);
        Route::post('catalog/{id}/restore', [MovieController::class, 'restore'])->name('movie.catalog.restore');
        Route::delete('catalog/{id}/force-delete', [MovieController::class, 'forceDelete'])->name('movie.catalog.forceDelete');
    });

    Route::prefix('actors')->name('actors.')->group(function () {
        Route::resource('/', ActorController::class)->parameters(['' => 'actor']);
        Route::post('{id}/restore', [ActorController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [ActorController::class, 'forceDelete'])->name('forceDelete');
    });

    Route::prefix('genres')->name('genres.')->group(function () {
        Route::resource('/', GenreController::class)->parameters(['' => 'genre']);
        Route::post('{id}/restore', [GenreController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [GenreController::class, 'forceDelete'])->name('forceDelete');
    });

    Route::prefix('directors')->name('directors.')->group(function () {
        Route::resource('/', DirectorController::class)->parameters(['' => 'director']);
    });
});



Route::prefix('/')->middleware('...')->group(function () {});
