<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LoginController;

//admin
Route::prefix('user')->group(function() {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function(){
    Route::get('/main', [MainController::class, 'index'])->name('admin');
    Route::prefix('setting')->group(function () {
        Route::get('general', [SettingController::class, 'settingGeneral']);
        Route::post('general', [SettingController::class, 'saveSettingGeneral']);
        Route::get('product', [SettingController::class, 'settingProduct']);
        Route::get('system', [SettingController::class, 'systemProduct']);
    });
    Route::prefix('page')->group(function () {
        Route::get('newpage', [PageController::class, 'add']);
        Route::post('newpage', [PageController::class, 'store']);
        Route::get('list', [PageController::class, 'listpage']);
        Route::get('show/{id}', [PageController::class, 'show']);
        Route::post('show/{id}', [PageController::class, 'update']);
        Route::post('delete/{id}', [PageController::class, 'destroy']);
        Route::get('update/{column}/{id}', [PageController::class, 'updateSelection']);
    });
    Route::get('top', [TopController::class, 'index']);

    Route::post('upload/store', [UploadController::class, 'store']);
    Route::post('top/update', [TopController::class, 'update']);
    Route::prefix('category')->group(function () {
        Route::get('add', [CategoryController::class, 'add']);
        Route::post('add', [CategoryController::class, 'store']);
        Route::post('slug', [CategoryController::class, 'checkSlug']);
        Route::get('list', [CategoryController::class, 'listCategory']);
        Route::get('show/{id}', [CategoryController::class, 'show']);
        Route::post('show/{id}', [CategoryController::class, 'update']);
        Route::post('delete/{id}', [CategoryController::class, 'destroy']);
    });
    Route::prefix('product')->group(function () {
        Route::get('add', [ProductController::class, 'add'])->name('add-product');
        Route::post('add', [ProductController::class, 'store']);
        Route::get('list', [ProductController::class, 'listProducts']);
        Route::get('list/{selection}', [ProductController::class, 'listProducts']); //asc, desc, trash
        Route::get('show/{id}', [ProductController::class, 'show']);
        Route::post('show/{id}', [ProductController::class, 'update']);
        Route::post('delete/{id}', [ProductController::class, 'destroy']);
        Route::get('update/{column}/{id}', [ProductController::class, 'updateSelection']);
    });
});


