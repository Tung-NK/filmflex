<?php


use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthenController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
}); // DEMO


// Làm từ đây nhé




Route::prefix('admin')->middleware('checkAdmin')->group(function () {
    Route::get('/', [AuthenController::class, 'formLogin'])->name('formLogin')->withoutMiddleware('checkAdmin');
    Route::post('postLogin', [AuthenController::class, 'postLogin'])->name('postLogin')->withoutMiddleware('checkAdmin');
    Route::get('logout', [AuthenController::class, 'logout'])->name('logout');


     Route::prefix('movie')->name('movie.')->group(function () {
        Route::resource('catalog', MovieController::class);
      
    });
});


Route::prefix('/')->middleware('...')->group(function () {});
