<?php 
namespace App\Repository;

use App\Models\attendance;
use App\Models\Grate;
use App\Models\Student;
use App\Models\teacher;

class AttedanceRepository implements AttedanceRepositoryInterface{
    public function index(){
$Grades=Grate::with(['sections'])->get();
$List_Grade=Grate::all();
$teachers=teacher::all();
return view('pages.Attendances.section',compact('Grades','List_Grade','teachers'));
    }
    public function store($requiste){
        try{
            if(!isset($requiste->attendences)){
                toastr()->success(trans('messages.Enter_data'));
        return redirect()->back();
            }
        foreach($requiste->attendences as $students_id=> $attendance){
            if($attendance=="presence"){
                $attendance_status=true;
            }else if ($attendance="absent"){
                $attendance_status=false;
            }
            attendance::create([
            'student_id'=>$students_id,
           
            'grade_id'=>$requiste->grade_id,
            'classroom_id'=>$requiste->classroom_id,
            'section_id'=>$requiste->section_id,
            
            'teacher_id'=>1,
            'attendence_date'=>date('Y-m-d'),
            'attendence_status'=> $attendance_status,
        ]);}
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
                    }

toastr()->success(trans('messages.success'));
return redirect()->back();
    }
    public function show($id){
        $students=Student::with(['attendance'])->where('section_id',$id)->get();
        return view('pages.Attendances.index',compact('students'));
    }
    public function edit($id){

    }
    public function update($requiste){

    }
    public function destroy($requiste){

    }
}