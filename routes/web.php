<?php

use App\Http\Controllers\Admin\ActorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.home');
}); // DEMO

Route::get('admin', function () {
    return view('admin.account.list-account');
}); // DEMO


// Làm từ đây nhé


    // Route::get('/', [abc::class , 'fromLogin'])->name('fromLogin')->withoutMiddleware('checkAdmin'); 
    //withoutMiddleware('....')-> bỏ qua kiểm tra của middleware
    Route::prefix('actors')->name('actors.')->group(function () {
        Route::resource('/', ActorController::class)->parameters(['' => 'actor']);
        Route::post('{id}/restore', [ActorController::class, 'restore'])->name('restore');
        Route::delete('{id}/force-delete', [ActorController::class, 'forceDelete'])->name('forceDelete');
    });



Route::prefix('/') -> middleware('...')->group(function (){
  
});