<?php
namespace App\Repository;

use App\Models\Classrom;
use App\Models\fees;
use App\Models\Fee_invoices;
use App\Models\Student_Accounts;
use App\Models\Student;
use App\Models\Grate;
use Illuminate\Support\Facades\DB;

class FessReepo implements FessInvoicesRepositoryinterface{
    public function index(){
$Fee_invoices=Fee_invoices::all();
$Grades=Grate::all();
     return view('pages.Fees_Invoices.index',compact('Fee_invoices','Grades'));   
    }
    
    public function show($id){
        $student=Student::findOrfail($id);
$fees=fees::where('Classroom_id',$student->Classroom_id )->get();

return view('pages.Fees_Invoices.add',compact('student','fees'));
    }
    public function store($re){
        DB::beginTransaction();
       try{
        foreach( $re->List_Fees as $data){
           // save data in invoices fees table مصاريف الباص 
           $fee =new Fee_invoices();
           $fee->invoice_date=date('Y-m-d');
           $fee->Student_id=$data['student_id'];
           $fee->Grade_id=$re->Grade_id;
           $fee->Fee_id=$data['fee_id'];
           $fee->classrom_id=$re->Classroom_id;
           $fee->amount=$data['amount'];
           $fee->description=$data['description'];
           $fee->save();
           // save in student account  بينات الطالب بتاعت المصاريف 
           $fee_acount=new Student_Accounts();
           $fee_acount->student_id=$data['student_id'];
           $fee_acount-> date =date('Y-m-d');
           $fee_acount-> type ='invoices';
           
           $fee_acount->fee_invoices_id=$fee->id;
           $fee_acount->Debit=$data['amount'];
           $fee_acount->Credit=0.0;
           $fee_acount->description=$data['description'];
           $fee_acount->save();
        }
       }catch(\Exception $e){
     DB::rollBack();
         return redirect()->back()->withErrors(['errors'=>$e->getMessage(),'congrate']);
       }
       DB::commit();
       toastr()->success('messages.success');
       return redirect()->route('Fees_Invoices.index');
    }
    public function update($re){
    // return $re;
        DB::beginTransaction();
        try{
       
            // save data in invoices fees table مصاريف الباص 
            $fee =Fee_invoices::findOrfail($re->id);
            $fee->Fee_id=$re->fee_id;
            $fee->amount=$re->amount;
            $fee->description=$re->description;
            $fee->update();
            // save in student account  بينات الطالب بتاعت المصاريف 
            $fee_acount=Student_Accounts::where('fee_invoices_id',$re->id)->first();
          
            
          
            $fee_acount->Debit=$re->amount;
            $fee_acount->Credit=0.0;
            $fee_acount->description=$re->description;
            $fee_acount->update();
            DB::commit();
            
        }catch(\Exception $e){
             DB::rollBack();
           return redirect()->back()->withErrors(['errors'=>$e->getMessage(),'congrate']);
        }
        toastr()->success('messages.Update');
            return redirect()->route('Fees_Invoices.index');
       
      
    }
    public function destroy($re){
        try{
            Fee_invoices::destroy($re->id);
            toastr()->error('messages.Delete');
return back();

}catch(\Exception $e){
    return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');
            }
    }
}