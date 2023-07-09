<?php

use App\Http\Controllers\parent\ChildrenController;
use App\Http\Controllers\Students\ExamsController;
use App\Http\Controllers\Students\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| parnt Routes
|--------------------------------------------------------------------------
|
| Here is where you can register student routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parnt']
    ], function(){ //...dashboard
    
    Route::view('/paraent/dashboard','pages.paraent.dashboard')->name('dashboard.parents');
    Route::get('children',[ChildrenController::class,'index'])->name('child.sons');
    Route::get('/resuelat/{id}',[ChildrenController::class,'results'])->name('sons.results');
    Route::get('/attendence',[ChildrenController::class,'attendence'])->name('student.attendence');
    Route::post('/attendence',[ChildrenController::class,'search'])->name('student.attendance.search');
    Route::get('/fessesdd',[ChildrenController::class,'fess'])->name('st.fees');
    Route::get('receipts/{id}',[ChildrenController::class,'receiptStudent'])->name('student.receipts');
    Route::get('/profileParent',[ChildrenController::class,'indexed'])->name('profileParent.show');
    Route::post('/profileParent',[ChildrenController::class,'update'])->name('profile.update.parent');
    });