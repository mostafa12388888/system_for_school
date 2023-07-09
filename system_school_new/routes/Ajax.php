<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Students\OnlineClassesController;
use App\Http\Controllers\Teacher\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\QuezziesController;
use App\Http\Controllers\Teacher\QuestionController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Ajax routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher,web']
    ], function(){
// Route::group(['middleware'=>],function(){
    Route::get('/getdatasections/{id}',[QuezziesController::class,'getdatasection']);
    Route::resource('/online_classes',OnlineClassesController::class);
    Route::get('/Indirect_online',[OnlineClassesController::class,'Indirect_online'])->name('Indirect_online');
    Route::post('/Indirect_Store',[OnlineClassesController::class,'Indirect_Store'])->name('Indirect_Store');
    Route::get('/getDataclasss/{id}',[QuezziesController::class,'getDataclass']);
});
   