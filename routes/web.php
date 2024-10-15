<?php

use App\Http\Controllers\Admin\CountrieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('users.home');
// }); // DEMO

// Route::get('admin', function () {
//     return view('admin.account.list-account');
// }); // DEMO


// Làm từ đây nhé

Route::prefix('admin') ->group(function (){
    // Route::get('/', [abc::class , 'fromLogin'])->name('fromLogin')->withoutMiddleware('checkAdmin'); 
    //withoutMiddleware('....')-> bỏ qua kiểm tra của middleware


    Route::prefix('movie') -> name('movie.') -> group(function (){
        // GET, POST, PUTH , PATCH, DELETE
    });

    Route::prefix('countrie')->name('countrie.')->group(function () {
        Route::get('/', [CountrieController::class, 'listCountrie'])->name('listCountrie');
        Route::post('add-countrie', [CountrieController::class, 'addCountrie'])->name('addCountrie');
        Route::delete('delete-countrie', [CountrieController::class, 'deleteCountrie'])->name('deleteCountrie');
        Route::get('detail-countrie', [CountrieController::class, 'detailCountrie'])->name('detailCountrie');
        Route::patch('update-countrie', [CountrieController::class, 'updateCountrie'])->name('updateCountrie');

    });
   
});


Route::prefix('/') -> middleware('...')->group(function (){
  
});