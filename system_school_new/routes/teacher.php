<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\QuezziesController;
use App\Http\Controllers\Teacher\QuestionController;

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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function(){ //...dashboard
    
    Route::get('/teacher/dashboard',[HomeController::class,'dashbordteacher']);
    Route::resource('/student-teacher',StudentController::class);
    Route::get('/sections',[StudentController::class,'sections'])->name('sections');
    Route::post('/attendance',[StudentController::class,'attendance'])->name('attendance');
    Route::post('/attendanceSearch',[StudentController::class,'Searche'])->name('attendance.search');
    Route::get('/getdatasections/{id}',[QuezziesController::class,'getdatasection']);
    Route::resource('/quizzes',QuezziesController::class);
    Route::get('/quizzes_student/{id}',[QuezziesController::class,'Degre_student'])->name('student.quizze');
    Route::post('/quizzes_student',[QuezziesController::class,'repeat_quizze'])->name('repeat.quizze');
    Route::resource('/questions',QuestionController::class);
    Route::get('/getDataclasss/{id}',[QuezziesController::class,'getDataclass']);
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.show');
    Route::post('/profile',[ProfileController::class,'update'])->name('profile.edit');
    });