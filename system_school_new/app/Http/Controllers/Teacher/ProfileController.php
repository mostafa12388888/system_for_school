<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function index(){
    $information=teacher::findOrfail(auth()->user()->id);
return view('pages.teachers.profile',compact('information'));
   }
   public function update(Request $request){
    if($request->password)
    teacher::findOrfail(auth()->user()->id)->update([
        'Name'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
        'password'=>$request->password,
    ]);
    else
    teacher::findOrfail(auth()->user()->id)->update([
        'Name'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
    ]);
    toastr()->success(trans('messages.Update'));
return redirect()->back();
   }
}
