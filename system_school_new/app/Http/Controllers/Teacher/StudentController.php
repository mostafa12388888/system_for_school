<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher=DB::table('teachers_sections')->where('teachers_id',auth()->user()->id)->pluck('sections_id');
        $students=Student::whereIn('section_id', $teacher)->get();
    
    return     view('pages.teachers.Student.index',compact('students'));
    }

   public function sections(){
    $id=DB::table('teachers_sections')->where('teachers_id',auth()->user()->id)->pluck('sections_id');
    $sections=Section::whereIn('id',$id)->get();
    return view('pages.teachers.section.index',compact('sections'));
}
public function attendance(Request $request){
    
    // if($request->edit){
    //     try{
    //         if(!isset($request->attendences)){
    //             toastr()->success(trans('messages.Enter_data'));
    //     return redirect()->back();
    //         }
      
    //         if($request->attendences=="presence"){
    //             $attendance_status=true;
    //         }else if ($request->attendences=="absent"){
    //             $attendance_status=false;
    //         }
    //         attendance::where('attendence_date',date('Y-m-d'))->where('student_id' ,$request->id)->update([
           
    //         'attendence_status'=> $attendance_status,
    //     ]);
    //     }catch(\Exception $e){
    //         return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
    //                 }
    //                 toastr()->success(trans('messages.Update'));
    //                 return redirect()->back();
    // }
    try{
        if(!isset($request->attendences)){
            toastr()->success(trans('messages.Enter_data'));
    return redirect()->back();
        }
    foreach($request->attendences as $students_id=> $attendance){
        if($attendance=="presence"){
            $attendance_status=true;
        }else if ($attendance="absent"){
            $attendance_status=false;
        }
        attendance::updateorCreate(['student_id'=>$students_id,'attendence_date'=>date('Y-m-d')],[
        'student_id'=>$students_id,
       
        'grade_id'=>$request->grade_id,
        'classroom_id'=>$request->classroom_id,
        'section_id'=>$request->section_id,
        
        'teacher_id'=>auth()->user()->id,
        'attendence_date'=>date('Y-m-d'),
        'attendence_status'=> $attendance_status,
    ]);}
    }catch(\Exception $e){
        return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
                }
                toastr()->success(trans('messages.success'));
                return redirect()->back();
   
}
public function attendanceEdite(Request $request,$rf){
    return $request;
    try{
        if(!isset($request->attendences)){
            toastr()->success(trans('messages.Enter_data'));
    return redirect()->back();
        }
  
        if($request->attendance=="presence"){
            $attendance_status=true;
        }else if ($request->attendance="absent"){
            $attendance_status=false;
        }
        attendance::where('attendence_date',date('Y-m-d'))->where('student_id' ,$request->id)->update([
       
        'attendence_status'=> $attendance_status,
    ]);
    }catch(\Exception $e){
        return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
                }
                return redirect()->back();
}
    public function create()
    {
        $students=Student::get();
       return view('pages.teachers.Student.attendence_report',compact('students'));
    }

public function Searche(Request $request){
    $request->validate([
        'from' =>'required|date|date_format:Y-m-d',
        'to' =>'required|date|date_format:Y-m-d|after_or_equal:from',
    ],[
        'from.required'=>trans('messages.required'),
        'to.required'=>trans('messages.required'),
        'to.after_or_equal'=>trans('messages.after_or_equal'),
        'to.date_format'=>trans('messages.date_format'),
    ]);
    
    $students=Student::get();
    if($request->student_id){
      $Students=attendance::whereBetween('attendence_date',[$request->from,$request->to])->where('student_id',$request->student_id)->get();
    }else{
        $Students=attendance::whereBetween('attendence_date',[$request->from,$request->to])->get();
    }
   
    return view('pages.teachers.Student.attendence_report',compact('Students','students'));

   }
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
}
