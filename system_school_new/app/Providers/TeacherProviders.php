<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TeacherProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Repository\teachersRepositoryInterface','App\Repository\techear');
        $this->app->bind('App\Repository\studentsRepositoryInterface','App\Repository\students');
        $this->app->bind('App\Repository\promotionsRepositoryInterface','App\Repository\promotionsClass');
        $this->app->bind('App\Repository\StudentGrateRepositoryInterface','App\Repository\Studentgrate');
        $this->app->bind('App\Repository\FeesRepositoryinterface','App\Repository\Fess');
        $this->app->bind('App\Repository\FessInvoicesRepositoryinterface','App\Repository\FessReepo');
        $this->app->bind('App\Repository\ReseptStudentInterface','App\Repository\ReseptStudent');
        $this->app->bind('App\Repository\processingfeeRepostoryInterFace','App\Repository\processingfeeRepostory');
        $this->app->bind('App\Repository\payment_studenInterFace','App\Repository\payment_studen');
        $this->app->bind('App\Repository\AttedanceRepositoryInterface','App\Repository\AttedanceRepository');
        $this->app->bind('App\Repository\subjectInterfaceRepository','App\Repository\subjectRepository');
        $this->app->bind('App\Repository\ExameRepositoryInterface','App\Repository\ExameRepository');
        $this->app->bind('App\Repository\QuizesInterfaceRepository','App\Repository\QuizesRepository');
        $this->app->bind('App\Repository\questionRepositoryInterface','App\Repository\questionRepository');
        $this->app->bind('App\Repository\LibraryRebostoryInterface','App\Repository\LibraryRebostory');
        $this->app->bind('App\Repository\teacherqueziesInterface','App\Repository\teacherqueziesRepository');
        $this->app->bind('App\Repository\ExamsStudentInterface','App\Repository\ExamsStudent');
   
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
