<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('auth.selection');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function dashbordteacher(){
        $teacher=teacher::findOrfail(auth()->user()->id)->Section()->pluck('sections_id');
       $data['teacher_count']=  $teacher->count();
       $data['student_count']=Student::whereIn('section_id',$teacher)->count();
       return view('pages.teachers.dashboard',$data);
    }
}
