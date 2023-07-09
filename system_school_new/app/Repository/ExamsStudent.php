<?php
namespace App\Repository;

use App\Models\Quizze;

class ExamsStudent implements ExamsStudentInterface{
    public function index(){
        $quizzes=Quizze::where('classroom_id',auth()
        ->user()->Classroom_id)->where('section_id',auth()->user()->section_id )
        ->where('grade_id',auth()->user()->Grade_id)->orderBy('id', 'DESC')->get();
        return view('pages.Students.Exames.index',compact('quizzes'));
    }
    public function edit($id){

    }
    public function show($id){
       $Student_id=auth()->user()->id;

        return view('pages.Students.Exames.show',compact('id','Student_id'));
   

    }
    public function update($request){

    }
    public function destroy($request){

    }
}