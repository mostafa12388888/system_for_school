<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information=Student::findOrfail(auth()->user()->id);
        return view('pages.Students.profile',compact('information'));
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->password)
        Student::findOrfail(auth()->user()->id)->update([
        'name'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
        'password'=>$request->password,
    ]);
    else
    Student::findOrfail(auth()->user()->id)->update([
        'name'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
    ]);
    toastr()->success(trans('messages.Update'));
return redirect()->back();
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
