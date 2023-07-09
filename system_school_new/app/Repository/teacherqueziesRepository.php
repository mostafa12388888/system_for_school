<?php
namespace App\Repository;

use App\Models\Classrom;
use App\Models\Grate;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\Subject;

class teacherqueziesRepository implements teacherqueziesInterface{
    public function index()
    {
        $quizzes=Quizze::where('teacher_id',auth()->user()->id)->get();
        return view('pages.teachers.Student.Quizzes.index',compact('quizzes'));
    }
    public function create()
    {
        $data['grades']=Grate::all();
        $data['subjects']=Subject::where('teacher_id',auth()->user()->id)->get();
   
       
        return view('pages.teachers.Student.Quizzes.create',$data);
    }
    public function getDataclass($id){
        $data=Classrom::where('Grate_id',$id)->plucK('Name_Class','id');
        return $data;
    }
    public function getdatasection($id){
        return Section::where('class_id',$id)->pluck('section_name','id');
    }
    public function edite($id){
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grate::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.teachers.Student.Quizzes.edit', $data, compact('quizz'));
    }
    public function update( $request)
    {
        try {
            $quizz = Quizze::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = auth()->user()->id;
            $quizz->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function desrtroy($request){
        Quizze::destroy($request->id);
        toastr()->error(trans('messages.DELETED'));
        return redirect()->back();
    }
    public function show($id){
        $questions=Question::where('quizze_id',$id)->get();
        $quizz=Quizze::findOrfail($id);
        return view('pages.teachers.Student.Questions.index',compact('questions','quizz'));
    }
}