<?php 
namespace App\Repository;

use App\Models\Grate;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\teacher;

class QuizesRepository implements QuizesInterfaceRepository{
    public function index(){
$quizzes=Quizze::all();
return view('pages.Quizzes.index',compact('quizzes'));
    }
    public function create(){
        $date['subjects']=Subject::all();
        $date['teachers']=teacher::all();
        $date['grades']=Grate::get();
        return view('pages.Quizzes.create',$date);
    }
    public function edit($id){
        $date['subjects']=Subject::all();
        $date['teachers']=teacher::all();
        $date['grades']=Grate::get();
        $date['quizz']=Quizze::findOrfail($id);
        
        return view('pages.Quizzes.edit',$date);
    }
    public function store($request){
        try {

            $quizzes = new Quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function update($request){
        try {
            $quizz = Quizze::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->teacher_id = $request->teacher_id;
            $quizz->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function destroy($requiste){
        try{
            Quizze::findorFail($requiste->id)->delete();
            toastr()->success(trans('messages.Delete'));
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
