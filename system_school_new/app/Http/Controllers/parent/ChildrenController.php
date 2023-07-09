<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\Degree;
use App\Models\Fee_invoices;
use App\Models\fees;
use App\Models\My_parnt;
use App\Models\Receipt_Student;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildrenController extends Controller
{
  public function indexed(){
    $information=My_parnt::findOrfail(auth()->user()->id);
return view('pages.paraent.profile',compact('information'));
   }
   public function update(Request $request){
    if($request->password)
    My_parnt::findOrfail(auth()->user()->id)->update([
        'Name_father'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
        'password'=>$request->password,
    ]);
    else
    My_parnt::findOrfail(auth()->user()->id)->update([
        'Name_father'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
    ]);
    toastr()->success(trans('messages.Update'));
return redirect()->back();
   }
  public function index(){
    $students=Student::where('parent_id',auth()->user()->id)->get();
    return view('pages.paraent.child.index',compact('students'));
  }
  public function results($id){
    $student=Student::findOrfail($id);
    if($student->parent_id!=auth()->user()->id){
        toastr()->error('يوجد خطا في كود الطالب');
        return redirect()->route('child.sons');
    }
$degrees=Degree::where('student_id',$id)->get();
if($degrees->isEmpty()){
    toastr()->error('لا توجد نتائج لهذا الطالب');
    return redirect()->route('child.sons');
}
return view('pages.paraent.degrees.index',compact('degrees'));
  }
  public function attendence(){
    $students=Student::where('parent_id',auth()->user()->id)->get();
    return view('pages.paraent.attendence.index',compact('students'));
  }
  public function search(Request $request){
    $request->validate([
      'from' => 'required|date|date_format:Y-m-d',
      'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
  ], [
      'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
      'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
      'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
  ]);

  $ids = DB::table('teachers_sections')->where('teachers_id', auth()->user()->id)->pluck('sections_id');
  $students = Student::whereIn('section_id', $ids)->get();

  if ($request->student_id == 0) {

      $Students = attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
      return view('pages.paraent.attendence.index', compact('Students', 'students'));
  } else {

      $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
          ->where('student_id', $request->student_id)->get();
      return view('pages.paraent.attendence.index', compact('Students', 'students'));

  }

  }
  public function fess(){
    // $students_ids = Student::where('parent_id', auth()->user()->id)->pluck('id');
    // $Fee_invoices = Fee_invoices::whereIn('student_id',$students_ids)->get();
    // return view('pages.paraent.fess.index', compact('Fee_invoices'));
    $Fee_invoices = array();

  $studen_id=Student::where('parent_id',auth()->user()->id)->pluck('id');
  $Fee_invoices=Fee_invoices::whereIn('Student_id',$studen_id)->get();
  // return $Fee_invoices;
  return view('pages.paraent.fess.index',compact('Fee_invoices'));

  }
  public function receiptStudent($id){
    $student=Student::findorFail($id);
    if($student->parent_id!=auth()->user()->id ){
      toastr()->error('يوجد خطا في كود الطالب');
      return redirect()->route('student.receipts');
    }
   
    $receipt_students=Receipt_Student::where('Student_id',$id)->get();
    if($receipt_students->isEmpty()){
      toastr()->error('لا توجد نتائج لهذا الطالب');
      return redirect()->route('student.receipts');
  }
  return view('pages.paraent.Recipts.index',compact('receipt_students'));
  }
}
