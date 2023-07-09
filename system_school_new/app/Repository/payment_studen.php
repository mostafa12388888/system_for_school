<?php 
namespace App\Repository;

use App\Models\Student;
use App\Models\payment_student;
use App\Models\fundAccount;
use App\Models\Student_Accounts;
use Illuminate\Support\Facades\DB;

class payment_studen implements payment_studenInterFace{
    public function index(){
$payment_students=payment_student::all();
return view('pages.Payment.index',compact('payment_students'));
    }
    public function show($id){
$student=Student::findOrfail($id);
return view('pages.Payment.add',compact('student'));
    }
    public function store($requiste){
     try{
        DB::beginTransaction();
        $payment=new payment_student();
        $payment->student_id =$requiste->student_id;
        $payment->date=date('Y-m-d');
        $payment->amount=$requiste->Debit;
        $payment->description=$requiste->description;
        $payment->save();




        $fun_accounnts=new fundAccount();
        $fun_accounnts->date=date('Y-m-d');
        $fun_accounnts->Payment_id=$payment->id;
        $fun_accounnts-> Debit =0.00;
        $fun_accounnts->credit=$requiste->Debit;
        $fun_accounnts->description=$requiste->description;
        $fun_accounnts->save();
        




        $student_account=new Student_Accounts();
        $student_account->student_id=$requiste->student_id;
        $student_account->Payment_id=$payment->id;
        $student_account->date=date('Y-m-d');
        $student_account->type='payment';
        $student_account->Debit=$requiste->Debit;
        $student_account->Credit=0.00;
        $student_account->description=$requiste->description;
        $student_account->save();
        DB::commit();
        toastr()->success(trans('messages.success'));
     }catch(\Exception $e){
        DB::rollBack();
return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');

     }
return redirect()->route('payment_studenontroller.index');
    }
    public function edit($id){
       $payment_student = payment_student::findOrfail($id);
        return view('pages.Payment.edit',compact('payment_student'));
    }
    public function update($requiste){
        try{
            DB::beginTransaction();
            $payment=payment_student::findOrfail($requiste->id);
            $payment->student_id =$requiste->student_id;
            $payment->date=date('Y-m-d');
            $payment->amount=$requiste->Debit;
            $payment->description=$requiste->description;
            $payment->save();
    
    
    
    
            $fun_accounnts=fundAccount::where('Payment_id',$requiste->id)->first();
            $fun_accounnts->date=date('Y-m-d');
            $fun_accounnts->Payment_id=$payment->id;
            $fun_accounnts-> Debit =0.00;
            $fun_accounnts->credit=$requiste->Debit;
            $fun_accounnts->description=$requiste->description;
            $fun_accounnts->save();
            
    
    
    
    
            $student_account=Student_Accounts::where('Payment_id',$requiste->id)->first();
            $student_account->student_id=$requiste->student_id;
            $student_account->Payment_id=$payment->id;
            $student_account->date=date('Y-m-d');
            $student_account->type='payment';
            $student_account->Debit=$requiste->Debit;
            $student_account->Credit=0.00;
            $student_account->description=$requiste->description;
            $student_account->save();
            DB::commit();
            toastr()->success(trans('messages.Update'));
         }catch(\Exception $e){
            DB::rollBack();
    return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');
    
         }
    return redirect()->route('payment_studenontroller.index');
    }
    public function destroy($requiste){
try{
    payment_student::destroy($requiste->id);
    toastr()->error(trans('messages.Deltete'));
    return redirect()->back();
}catch(\Exception $e){
return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');
    }}
}