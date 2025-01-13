<?php

use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LanguageController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.store');
});



Route::prefix('admin')->middleware('auth:admin')->group(function () {

    //Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

    Route::prefix('languages')-> group(function(){
        Route:: get('/',[LanguageController::class,'show'])->name('admin.languages');
        Route:: get('/active',[LanguageController::class,'active'])->name('admin.languages.active');
        Route:: post('/create',[LanguageController::class,'create'])->name('admin.languages.create');
        Route:: post('/update{id}',[LanguageController::class,'update'])->name('admin.languages.update');
        Route:: get('/destroy{id}',[LanguageController::class,'destroy'])->name('admin.languages.destroy');
    });
});





Route::get('helper-test', function() {
    return get_language();
});

