<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
}); // DEMO

Route::get('admin', function () {
    return view('admin.account.list-account');
}); // DEMO


// Làm từ đây nhé

Route::prefix('admin')->middleware('...')->group(function () {
    // Route::get('/', [abc::class , 'fromLogin'])->name('fromLogin')->withoutMiddleware('checkAdmin'); 
    //withoutMiddleware('....')-> bỏ qua kiểm tra của middleware


    Route::prefix('movie')->name('movie.')->group(function () {
        // GET, POST, PUTH , PATCH, DELETE
    });
});


Route::prefix('/')->middleware('...')->group(function () {});

//movie
Route::resource('admin/catalog', MovieController::class);
