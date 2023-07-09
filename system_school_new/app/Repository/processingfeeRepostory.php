<?php
namespace App\Repository;

use App\Models\processingfee;
use App\Models\Student;
use App\Models\Student_Accounts;
use Illuminate\Support\Facades\DB;

class processingfeeRepostory implements processingfeeRepostoryInterFace{
public function index()
{
    $ProcessingFees=processingfee::all();
    return view('pages.ProcessingFee.index',compact('ProcessingFees'));
}  
public function show($id){
    $student=Student::where('id',$id)->first();
    return  view('pages.ProcessingFee.add',compact('student'));
}
public function store($requiste){
    try{
        DB::beginTransaction();
        $processingfee=new processingfee();
        $processingfee->date=date("Y-m-d");
        $processingfee->Student_id=$requiste->student_id;
        $processingfee->amount=$requiste->Debit;
        $processingfee->descrption=$requiste->description;
        $processingfee->save();

        $student_account=new Student_Accounts();
        $student_account->student_id=$requiste->student_id;
        // $student_account->fee_invoices_id=
        // $student_account->receipt_id=
        $student_account->processingfees_id=$processingfee->id;
        $student_account->date=date('Y-m-d');
        $student_account->type="processingFee";
        $student_account->Debit=0.00;
        $student_account->Credit=$requiste->Debit;
        $student_account->description=$requiste->description;
        $student_account->save();
DB::commit();
toastr(trans('messages.success'));

    }catch(\Exception $e){
        DB::rollBack();
return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');
    }
    return redirect()->route('ProcessingFee.index');
}
public function edit($id){
    $ProcessingFee=processingfee::findOrfail($id);
    return view('pages.ProcessingFee.edit',compact('ProcessingFee'));
}
public function update($requiste)
{
    try{
        DB::beginTransaction();
        $processingfee= processingfee::findOrfail($requiste->id);
        $processingfee->date=date("Y-m-d");
        $processingfee->Student_id=$requiste->student_id;
        $processingfee->amount=$requiste->Debit;
        $processingfee->descrption=$requiste->description;
        $processingfee->save();

        $student_account=Student_Accounts::Where('processingfees_id',$requiste->id)->first();
        $student_account->student_id=$requiste->student_id;
        // $student_account->fee_invoices_id=
        // $student_account->receipt_id=
        $student_account->processingfees_id=$processingfee->id;
        $student_account->date=date('Y-m-d');
        $student_account->type="processingFee";
        $student_account->Debit=0.00;
        $student_account->Credit=$requiste->Debit;
        $student_account->description=$requiste->description;
        $student_account->save();
DB::commit();

toastr()->success(trans('messages.Update'));
    }catch(\Exception $e){
        DB::rollBack();
return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');}
    return redirect()->route('ProcessingFee.index');
}

}