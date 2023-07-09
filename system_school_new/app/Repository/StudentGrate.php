<?php 
namespace App\Repository;

use App\Models\Grate;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;
 use Illuminate\Support\Facades\File;

class Studentgrate implements StudentGrateRepositoryInterface{
    public function index(){
$students=Student::onlyTrashed()->get();
return view('pages.Students.Graduated.index',compact('students'));
    }
    public function create()
    {
        $Grades=Grate::all();
        return view('pages.Students.Graduated.create',compact('Grades'));
    }
    public function store($re){
        $student=Student::where('Grade_id',$re->Grade_id)->where('Classroom_id',$re->Classroom_id)->where('section_id',$re->section_id)->get();
   if( $student->count()<1){
    return redirect()->back()->with('error_Graduated',__(trans("messages.errors")));
   }
   foreach($student as $stud){
    $ids=explode(',',$stud->id);
    Student::whereIn('id',$ids)->delete();
   }
   toastr()->success('messages.success');
return back(); 
    }
    public function restoredate($re){
        Student::onlyTrashed()->where('id',$re->id)->first()->restore();
        toastr()->success('messages.success');
return back(); 
    }
    public function destroy($re){
        Student::onlyTrashed()->where('id',$re->id)->first()->forceDelete();
        File::deleteDirectory(public_path('Attachment/Students/'.$re->name));
        toastr()->error('messages.errors');
        return back(); 
    }
    public function promotion_student($re){
    
        DB::beginTransaction();
        try{
       
            
           $student=Student::where('id',$re->id)->first();
           
            Promotion::updateOrCreate([
                'student_id'=>$re->id,
                'from_grade'=>$student->gender_id,
                'from_classroom'=>$student->Classroom_id,
                'from_section'=>$student->section_id,
                'to_grade'=>$re->Grade_id,
                'to_classroom'=>$re->Classroom_id,
                'to_section'=>$re->section_id,
                'acadmic_year'=>$student->academic_year,
                'acadmic_year_new'=>$re->academic_year,
            ]);
                Student::Where('id',$re->id)->update([
            'Grade_id'=>$re->Grade_id ,
            'Classroom_id'=>$re->Classroom_id ,
            'section_id'=>$re->section_id ,
            'academic_year'=>$re->academic_year,]);
           
            DB::commit();
            toastr()->success('messages.revers');
          
            return redirect()->back(); }catch(\Exception $e){
        
                DB::rollBack();
           
                return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');
    }
    }
    public function graduate_student($id){
Student::destroy($id);
toastr()->error('messages.errors');
return back(); 
    }
}