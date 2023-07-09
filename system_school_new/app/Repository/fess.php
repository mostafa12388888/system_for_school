<?php 
namespace App\Repository;

use App\Models\fees;
use App\Models\Grate;

class fess implements FeesRepositoryinterface{
    public function index(){
        
        $fees=fees::all();
        return view('pages.Fees.index',compact('fees'));
    }
    public function create(){
$Grades=Grate::all();
        return view('pages.Fees.addStudent',compact('Grades'));
    }
    public function store($re){
        fees::create([
            'title'=>['ar'=>$re->title_ar,'en'=>$re->title_en],
            'amount'=>$re->amount,
            'Grade_id'=>$re->Grade_id,
            'Classroom_id'=>$re->Classroom_id,
            'description'=>$re->description,
            'year'=>$re->year,
            'Fee_type'=>$re->fess_type,
        ]);
        toastr()->success('messages.success');
        return back();

    }
    public function update($re){
        fees::findOrfail($re->id)->update([
            'title'=>['ar'=>$re->title_ar,'en'=>$re->title_en],
            'amount'=>$re->amount,
            'Grade_id'=>$re->Grade_id,
            'Classroom_id'=>$re->Classroom_id,
            'description'=>$re->description,
            'year'=>$re->year,
            'Fee_type'=>$re->fess_type,
        ]);
        toastr()->success('messages.Update');
        return back();
    }
}