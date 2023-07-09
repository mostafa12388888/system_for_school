<?php
namespace App\Repository;

use App\Http\Requests\promotions;
use App\Models\Grate;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class promotionsClass implements promotionsRepositoryInterface{
 public function index(){
            $Grades =Grate::all();
            // dd($promotion);
            return view('pages\Students\promotions\index',compact('Grades'));

    }
    public function store($re){
        DB::beginTransaction();
        try{
        $students=Student::where('Grade_id',$re->Grade_id)->where('Classroom_id',$re->Classroom_id)->where('section_id',$re->section_id)->where('academic_year',$re->academic_year)->get();
if($students->count()<1){
    return redirect()->back()->with('error_promotions',__(trans("messages.errors")));
}
foreach($students as $student){
    $ids=explode(',',$student->id);
    Student::WhereIn('id',$ids)->update([
'Grade_id'=>$re->Grade_id_new,
'Classroom_id'=>$re->Classroom_id_new,
'section_id'=>$re->section_id_new,
'academic_year'=>$re->academic_year_new,
    ]);
    Promotion::updateOrCreate([
        'student_id'=>$student->id,
        'from_grade'=>$re->Grade_id,
        'from_classroom'=>$re->Classroom_id,
        'from_section'=>$re->section_id,
        'to_grade'=>$re->Grade_id_new,
        'to_classroom'=>$re->Classroom_id_new,
        'to_section'=>$re->section_id_new,
        'acadmic_year'=>$re->academic_year,
        'acadmic_year_new'=>$re->academic_year_new,
    ]);

}   }catch(\Exception $e){
    
        DB::rollBack();
       
return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');
}
DB::commit();
toastr()->success('messages.success');
return back(); 
}
public function create(){
    $promotions=Promotion::all();
    return view('pages\Students\promotions\management',compact('promotions'));
}
public function destroy($re){
    DB::beginTransaction();
    try{
    if($re->page_id==1){
        $promotion=Promotion::all();
        foreach($promotion as $promotion){
            $ids=explode(',',$promotion->student_id);
            Student::WhereIn('id',$ids)->update([
        'Grade_id'=>$promotion->from_grade ,
        'Classroom_id'=>$promotion->from_classroom ,
        'section_id'=>$promotion->from_section ,
        'academic_year'=>$promotion->acadmic_year,]);}
        Promotion::truncate();
        DB::commit();
        toastr()->success('messages.revers');
      
        return redirect()->back();}
        $promotion=Promotion::findOrfail($re->id);
        Student::findOrfail($promotion->student_id)->update([
            'Grade_id'=>$promotion->from_grade ,
            'Classroom_id'=>$promotion->from_classroom ,
            'section_id'=>$promotion->from_section ,
            'academic_year'=>$promotion->acadmic_year,]);
            $promotion->delete();
            DB::commit();
            toastr()->success('messages.revers');
      
            return redirect()->back();
        
}catch(\Exception $e){
    
        DB::rollBack();
       
return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');
}
}} 