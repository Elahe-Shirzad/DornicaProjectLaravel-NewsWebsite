<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('index');

Route::get('contact-us',[ContactUsController::class,'contactUs'])->name('contact-us');
Route::get('about-us',[AboutUsController::class,'aboutUs'])->name('about-us');

Route::post('add',[FavoriteController::class,'favoriteNews'])->name('add.favorite.news');
Route::get('/api/cities/{province}', [CityController::class, 'getCitiesByProvince']);

Route::prefix('news')->as('news.')->group(function () {

    Route::get('category/{categoryId}', [CategoryController::class, 'category'])->name('category');

    Route::prefix('{newsId}')->group(function () {


        Route::get('detail', [NewsController::class, 'detail'])->name('detail');
        Route::post('/', [NewsController::class, 'leaveComment'])->name('leaveComment');


    });

});


Route::prefix('users')->as('users.')->middleware('auth')->group(function () {

    Route::get('/',[UserController::class,'dashboard'])->name('dashboard');

    Route::prefix('account')->as('account.')->group(function () {

    Route::get('show',[UserController::class,'show'])->name('show');
    Route::put('update',[UserController::class,'update'])->name('update');

    });

    Route::prefix('favorites')->as('favorites.')->group(function () {

        Route::get('show',[UserController::class,'showFavorite'])->name('show');
        Route::delete('{newsId}/delete',[UserController::class,'delete'])->name('delete');

    });

    Route::get('showComment',[UserController::class,'showComment'])->name('show.comment');

});




