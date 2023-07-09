<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\teacher;
use Illuminate\Support\Facades\Hash;

class techear implements teachersRepositoryInterface{
    public function getAllteachers(){
        // return 'pp';
        return teacher::all();
    }
    public function getAllgender(){
return Gender::all();
    }
    public function getAllsections(){
return Specialization::all();
    }
    public function setTeacher($re){ 	
        	 	
        $te=new teacher();

        $te->Email=$re->Email;
        $te->Password=Hash::make($re->password);
        $te->Name=['ar'=>$re->Name_ar,'en'=>$re->Name_en];
        $te->Specialization_id=$re->Specialization_id;
        $te->Gender_id=$re->Gender_id;
        $te->Joining_Date=$re->Joining_Date;
        $te->Address=$re->Address;
        $te->save();
        toastr()->success(trans('messages.success'));
        // teacher::create([
        //     'Email'=>$re->Email,
        //     'Password'=>Hash::make($re->password),
        //     'Name'=>['ar'=>$re->Name_ar,'en'=>$re->Name_en],
        //     'Specialization_id'=>$re->Specialization_id,
        //     'Gender_id'=>$re->Gender_id,
        //     'Joining_Date'=>$re->Joining_Date,
        //     'Address'=>$re->Address,
        // ]);
    }
    public function setUpdate($re){
        $te= teacher::findOrFail($re->id);

        $te->Email=$re->Email;
        $te->Password=Hash::make($re->password);
        $te->Name=['ar'=>$re->Name_ar,'en'=>$re->Name_en];
        $te->Specialization_id=$re->Specialization_id;
        $te->Gender_id=$re->Gender_id;
        $te->Joining_Date=$re->Joining_Date;
        $te->Address=$re->Address;
        $te->update();
        toastr()->success(trans('messages.Update'));
    }
}