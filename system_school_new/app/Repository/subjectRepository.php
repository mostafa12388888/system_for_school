<?php 
namespace App\Repository;

use App\Models\Grate;
use App\Models\Subject;
use App\Models\teacher;

class subjectRepository implements subjectInterfaceRepository{
    public function index(){
$subjects=Subject::get();
return view('pages.Subjects.index',compact('subjects'));
    }
    public function create(){
        $grades=Grate::all();
        $teachers=teacher::all();
        return view('pages.Subjects.create',compact('grades','teachers'));
    }
    public function show(){

    }
    public function edit($id){
        $grades=Grate::all();
        $teachers=teacher::all();
        $subject= Subject::where('id',$id)->first();
        return view('pages.Subjects.edite',compact('subject','grades','teachers'));
    }
    public function store($requiste){
        try{
Subject::create([
    'name'=>['ar'=>$requiste->Name_ar,'en'=>$requiste->Name_en],
    'grade_id'=>$requiste->Grade_id,
    'classroom_id'=>$requiste->Class_id,
    'teacher_id'=>$requiste->teacher_id,
]);
toastr()->success(trans('messages.succes'));
return redirect()->route('Subjects.index');
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
    public function update($requiste){
        try{
        Subject::findOrfail($requiste->id)->update([
            'name'=>['ar'=>$requiste->Name_ar,'en'=>$requiste->Name_en],
            'grade_id'=>$requiste->Grade_id,
            'classroom_id'=>$requiste->Class_id,
            'teacher_id'=>$requiste->teacher_id,
        ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('Subjects.index');
    }catch(\Exception $e){
        return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
    }
    }
    public function destroy($requiste){
        try{
        Subject::destroy($requiste->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->back(); }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        }
    }
}