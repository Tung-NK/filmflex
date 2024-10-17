<?php


use App\Http\Controllers\Admin\CountrieController;


use App\Http\Controllers\MovieController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthenController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
}); // DEMO


Route::prefix('admin')->middleware('checkAdmin')->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('indexDashboard');
    });

    Route::get('/', [AuthenController::class, 'formLogin'])->name('formLogin')->withoutMiddleware('checkAdmin');
    Route::post('postLogin', [AuthenController::class, 'postLogin'])->name('postLogin')->withoutMiddleware('checkAdmin');
    Route::get('logout', [AuthenController::class, 'logout'])->name('logout');


    Route::prefix('countrie')->name('countrie.')->group(function () {
        Route::get('/', [CountrieController::class, 'listCountrie'])->name('listCountrie');
        Route::post('add-countrie', [CountrieController::class, 'addCountrie'])->name('addCountrie');
        Route::delete('delete-countrie', [CountrieController::class, 'deleteCountrie'])->name('deleteCountrie');
        Route::get('detail-countrie', [CountrieController::class, 'detailCountrie'])->name('detailCountrie');
        Route::patch('update-countrie', [CountrieController::class, 'updateCountrie'])->name('updateCountrie');
    });

    Route::prefix('movie')->name('movie.')->group(function () {
        Route::resource('catalog', MovieController::class);
    });

    Route::prefix('actors')->name('actors.')->group(function () {
        Route::resource('/', ActorController::class)->parameters(['' => 'actor']);
        Route::post('{id}/restore', [ActorController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [ActorController::class, 'forceDelete'])->name('forceDelete');
    });
});



Route::prefix('/')->middleware('...')->group(function () {});
