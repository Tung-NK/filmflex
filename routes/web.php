<?php

use Illuminate\Support\Facades\Route;




use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthenController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\Admin\CountrieController;
use App\Http\Controllers\admin\DirectorController;
use App\Http\Controllers\Admin\MovieController;

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

Route::middleware('checkUser')->group(function () {
    //Trang chủ
    Route::get('/', [HomeController::class, 'index'])->name('home')->withoutMiddleware('checkUser');

    //Login-Logout User
    Route::get('/login', [UserController::class, 'login'])->name('login')->withoutMiddleware('checkUser');
    Route::post('/login', [UserController::class, 'postlogin'])->name('postlogin')->withoutMiddleware('checkUser');
    Route::get('/register', [UserController::class, 'register'])->name('register')->withoutMiddleware('checkUser');
    Route::post('/register', [UserController::class, 'postRegister'])->withoutMiddleware('checkUser');
    Route::get('/logoutuser', [UserController::class, 'logoutuser'])->name('logoutuser')->withoutMiddleware('checkUser');

    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', [AccountController::class, 'detailUser'])->name('detailUser');
        Route::post('update', [AccountController::class, 'updateProfile'])->name('updateProfile');

        Route::post('change-password', [AccountController::class, 'changePass'])->name('changePass');
    });
});




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

    Route::prefix('directors')->name('directors.')->group(function () {
        Route::resource('/', DirectorController::class)->parameters(['' => 'director']);
    });
});
