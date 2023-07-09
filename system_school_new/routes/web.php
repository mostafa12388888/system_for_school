<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grates\GrateController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ClassromController;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StFudents\AttenanceController;
use App\Http\Controllers\Students\GratedController;
use App\Http\Controllers\Students\PromotionsController;
use App\Http\Controllers\Students\StudenController;
use App\Http\Controllers\Students\processingfeecontroller;
use App\Http\Controllers\Students\ReceptStudentController;
use App\Http\Controllers\Students\payment_studenontroller;
use App\Http\Controllers\TeachersContrller;
use App\Http\Controllers\Students\FeesInvoicesController;
use App\Http\Controllers\Students\LibrareController;
use App\Http\Controllers\Students\OnlineClassesController;
use App\Http\Controllers\SubjectController;
use App\Http\Livewire\Calendar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[HomeController::class,'index'])->middleware('guest')->name('selection');
Route::middleware('guest')->group(function(){
Route::get('/login/{type}',[AuthenticatedSessionController::class,'loginForm'])->name('login.show');
Route::get('/login',[HomeController::class,'index']);
Route::post('/login', [AuthenticatedSessionController::class, 'login'])->name('login');

});
Route::get('/logout/{type}', [AuthenticatedSessionController::class, 'logout'])->name('logout');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function(){ //...dashboard
        
        Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
        Route::resource('calsses-student',ClassromController::class);
        Route::post('/Deleteall',[ClassromController::class,'Delete_all'])->name('Deleteall');
        Route::post('/filter',[ClassromController::class,'filter_Name'])->name('filter');
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
        Route::resource('/Grates-show',GrateController::class);
        Route::resource('/showsection',SectionController::class);
       
        Route::get('/classes-data/{id}',[SectionController::class,'classroms']);
        Route::resource('teachers-for-school',TeachersContrller::class);
        Route::view('/add_parent','livewire.showform')->name('add_parent');
        Route::resource('/students',StudenController::class);
        Route::get('getDataclass/{id}',[StudenController::class,'getDataclass']);
        Route::get('getdatasection/{id}',[StudenController::class,'getdatasection']);//
        Route::post('/uploadeAttachment',[StudenController::class,'uploadeAttachment'])->name('uploadeAttachment');
        Route::post('/Delete_attachment',[StudenController::class,'Delete_attachment'])->name('Delete_attachment');
        Route::get('/DonloadAttachment/{fileName}/{studentName}',[StudenController::class,'DonloadAttachment'])->name('DonloadAttachment');
        Route::resource('/promtion',PromotionsController::class);
        Route::resource('/Graduated',GratedController::class);
        Route::resource('/Fees_Invoices',FeesInvoicesController::class);
        Route::resource('/Fees',FeesController::class);
        Route::get('/deleteInfo/{id}',[Calendar::class,'delete'])->name('Calendar');
        Route::resource('/payment_studenontroller',payment_studenontroller::class);
        Route::resource('/attendances',AttenanceController::class);
        Route::resource('/Subjects',SubjectController::class);
        Route::resource('/Exams',ExameController::class);
        Route::resource('/quizzes',QuizzesController::class);
        Route::resource('/questions',QuestionController::class);
        // Route::resource('/online_classes',OnlineClassesController::class);
        // Route::get('/Indirect_online',[OnlineClassesController::class,'Indirect_online'])->name('Indirect_online');
        // Route::post('/Indirect_Store',[OnlineClassesController::class,'Indirect_Store'])->name('Indirect_Store');
      
        Route::resource('/ProcessingFee',processingfeecontroller::class);
        Route::resource('/library',LibrareController::class);
        Route::resource('ResceptStudent',ReceptStudentController::class);
        Route::get('/Graduated_one_student/{id}',[GratedController::class,'graduate_student']);
        Route::get('/downloadAttachment/{id}',[LibrareController::class,'downloadAttachment'])->name('downloadAttachment');
        Route::post('/promotion_one_student',[GratedController::class,'promotion_student'])->name('promotion_one_student');
        Storage::disk('upload_attachments');
        Route::resource('/settings',SettingController::class);
    });
   // require __DIR__.'/auth.php';