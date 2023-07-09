<?php

use App\Http\Controllers\Students\ExamsController;
use App\Http\Controllers\Students\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| student Routes
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function(){ //...dashboard
    
    Route::view('/student/dashboard','pages.Students.dashboard');
    Route::resource('/Student_Exams',ExamsController::class);
    Route::resource('/profiles',ProfileController::class);
    });