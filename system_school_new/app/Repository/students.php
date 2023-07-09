<?php 
namespace App\Repository;

use App\Models\Classrom;
use App\Models\Gender;
use App\Models\Grate;
use App\Models\Image;
use App\Models\My_parnt;
use App\Models\National;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\teacher;
use App\Models\Type_Blood;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\delete;

class students implements studentsRepositoryInterface{
    public function createSudent(){
        $data['Genders']=Gender::all();
        $data['Section']=Section::all();
        $data['parents']=My_parnt::all();
        $data['nationals']=National::all();
        $data['bloods']=Type_Blood::all();
        $data['my_classes']=Grate::all();
        return view('pages.Students.add',$data);

    }
    public function getDataclass($id){
        $data=Classrom::where('Grate_id',$id)->plucK('Name_Class','id');
        return $data;
    }
    public function getdatasection($id){
        return Section::where('class_id',$id)->pluck('section_name','id');
    }
 public function Store_Student($re){
        // return $re;
        // return $re->hasfile('photos');
         	 	 	 		DB::beginTransaction();
                            try{	 	 	 	 	 	
        $Stuudent=new Student();
$Stuudent->name=['ar'=>$re->name_ar,'en'=>$re->name_en];
$Stuudent->email=$re->email;
$Stuudent->password=Hash::make($re->password);
$Stuudent->gender_id=$re->gender_id;    
$Stuudent->nationalitie_id=$re->nationalitie_id;    
$Stuudent->blood_id=$re->blood_id;    
$Stuudent->Date_Birth=$re->Date_Birth;    
$Stuudent->Grade_id=$re->Grade_id;    
$Stuudent->Classroom_id=$re->Classroom_id;    
$Stuudent->section_id=$re->section_id;    
$Stuudent->parent_id=$re->parent_id;    
$Stuudent->academic_year=$re->academic_year;    
$Stuudent->save();

if($re->hasfile('photos')){

     foreach($re->file('photos') as $F){
        $F ->move(public_path('Attachment/Students/'.$Stuudent->name),$F->getClientOriginalName()) ;
        // $F->storeAs('Attachment/Students', $F->getClientOriginalName(),['disk' => 'public']);
        // $F->storeAs('Attachment/Students',$F->getClientOriginalName(),'upload_attachments');
        $attach=new Image();
        $attach->file_Name=$F->getClientOriginalName();
        $attach->imageable_id=$Stuudent->id;
        $attach->imageable_type='App\Models\Student';
        $attach->save();
    
     }
   

    }
                            
 DB::commit();
                          
toastr()->success(trans('messages.success'));
return redirect()->route('students');

}catch(\Exception $e){
    DB::rollBack();
   return redirect()->back()->withErrors(['errors'=>$e->getMessage()],'congrate');}
  
}
public function Get_Students()
{
    $students=Student::all();
    return view('pages.Students.index',compact('students'));
}
public function edit_Students($id){
$data['Students']=Student::where('id','=',$id)->first();

$data['Grades']=Grate::all();
$data['Genders']=Gender::all();
$data['Section']=Section::all();
$data['parents']=My_parnt::all();
$data['nationals']=National::all();
$data['bloods']=Type_Blood::all();
$data['my_classes']=Grate::all();
    return view('pages.Students.edit',$data);
}
public function Update_Students($re){
    $Stuudent=Student::findOrfail($re->id);
    $Stuudent->name=['ar'=>$re->name_ar,'en'=>$re->name_en];
    $Stuudent->email=$re->email;
    $Stuudent->password=Hash::make($re->password);
    $Stuudent->gender_id=$re->gender_id;    
    $Stuudent->nationalitie_id=$re->nationalitie_id;    
    $Stuudent->blood_id=$re->blood_id;    
    $Stuudent->Date_Birth=$re->Date_Birth;    
    $Stuudent->Grade_id=$re->Grade_id;    
    $Stuudent->Classroom_id=$re->Classroom_id;    
    $Stuudent->section_id=$re->section_id;    
    $Stuudent->parent_id=$re->parent_id;    
    $Stuudent->academic_year=$re->academic_year;    
    $Stuudent->save();
    toastr()->success(trans('messages.Update'));
    return redirect()->route('students.index');
}
public function Show_Students($id){
$Student=Student::findOrfail($id);
return view('pages.Students.show_attchment',compact('Student'));
}
public function uploadeAttachment($re){
    foreach($re->photos as $photo){
        $photo ->move(public_path('Attachment/Students/'.$re->student_name),$photo->getClientOriginalName()) ;
    $sav=new Image();
    $sav->file_Name=$photo->getClientOriginalName();
    $sav->imageable_id=$re->student_id;
    $sav->imageable_type='App\Models\Student';
    toastr()->success(trans('messages.success'));
    $sav->save();
    }
    return back();
}
public function DonloadAttachment1($Sname,$Fname){
    
    return response()->download(public_path('Attachment/Students/'.$Sname.'/'.$Fname));
}
public function Delete_attachment($re){
    Image::destroy($re->id);
   Storage::delete(public_path('Attachment/Students/'.$re->student_name.'/'.$re->filename));
    toastr()->error(trans('messages.Delete'));
    return back();
}
}