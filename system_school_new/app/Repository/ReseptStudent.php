<?php 
namespace App\Repository;

use App\Models\fundAccount;
use App\Models\Receipt_Student;
use App\Models\Student;
use App\Models\Student_Accounts;
use Illuminate\Support\Facades\DB;

class ReseptStudent implements ReseptStudentInterface{
public function index(){
$receipt_students=Receipt_Student::all();
return view('pages.Recept.index',compact('receipt_students'));
}
public function show($id){
    $student=Student::findOrfail($id);
    return view('pages.Recept.add',compact('student'));
}
public function store($requiste){
    DB::beginTransaction();
 try{
    $receiptStudent= new Receipt_Student();
    $receiptStudent->date=date('Y-m-d');
    $receiptStudent->Student_id=$requiste->student_id;
    $receiptStudent->Debit=$requiste->Debit;
    $receiptStudent->description=$requiste->description;
    $receiptStudent->save();

    $fun_accounnts=new fundAccount();
    $fun_accounnts->date=date('Y-m-d');
    $fun_accounnts->receipt_id=$receiptStudent->id;
    $fun_accounnts-> Debit =$requiste->Debit;
    $fun_accounnts->credit=0.00;
    $fun_accounnts->description=$requiste->description;
    $fun_accounnts->save();
    

    $student_Acount=new Student_Accounts();
    $student_Acount->student_id=$requiste->student_id;
    // $student_Acount->fee_invoices_id=;
    $student_Acount->receipt_id=$receiptStudent->id;
    $student_Acount->date=date('Y-m-d');
    $student_Acount->type='receipt';
    $student_Acount->Debit=0.00;
    $student_Acount->Credit=$requiste->Debit;
    $student_Acount->description=$requiste->description;
    $student_Acount->save();
    DB::commit();
}catch(\Exception $e){
    DB::rollBack();
    return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');}

toastr()->success(trans('messages.success'));
return redirect()->route('ResceptStudent.index');
}
public function edit($id){
    $receipt_student=Receipt_Student::findOrfail($id);
    return view('pages.Recept.edit',compact('receipt_student'));
}
public function update($requiste){
    DB::beginTransaction();
    try{
       $receiptStudent=  Receipt_Student::findOrfail($requiste->id);
       $receiptStudent->date=date('Y-m-d');
       $receiptStudent->Student_id=$requiste->student_id;
       $receiptStudent->Debit=$requiste->Debit;
       $receiptStudent->description=$requiste->description;
       $receiptStudent->save();
   
       $fun_accounnts=fundAccount::where('receipt_id',$requiste->id)->first();
       $fun_accounnts->date=date('Y-m-d');
       $fun_accounnts->receipt_id=$receiptStudent->id;
       $fun_accounnts-> Debit =$requiste->Debit;
       $fun_accounnts->credit=0.00;
       $fun_accounnts->description=$requiste->description;
       $fun_accounnts->save();
       $student_Acount=Student_Accounts::where('receipt_id',$requiste->id)->first();
       $student_Acount->student_id=$requiste->student_id;
       // $student_Acount->fee_invoices_id=;
       $student_Acount->receipt_id=$receiptStudent->id;
       $student_Acount->date=date('Y-m-d');
       $student_Acount->type='receipt';
       $student_Acount->Debit=0.00;
       $student_Acount->Credit=$requiste->Debit;
       $student_Acount->description=$requiste->description;
       $student_Acount->save();
       DB::commit();
   }catch(\Exception $e){
    DB::rollBack();
           
    return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');}
       toastr()->success(trans('messages.Update'));
       return redirect()->route('ResceptStudent.index');}
}