<?php

namespace App\Http\Controllers;

use App\Models\Classrom;
use Illuminate\Http\Request;
use App\Models\Grate;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\storeClassrom;

class ClassromController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  $Grades=Grate::all();
        $My_Classes=Classrom::all();
        return view('pages.myclasses.my_classes',compact('Grades','My_Classes')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeClassrom $request)
    {
        // $List_Classes = $request->List_Classes;
      
       try{
        $validated = $request->validated();
                // $v=$request->validate([
        //     'Name_ar'=>'required',
        //     'Name_class_en'=>'required',
        //     'Grade_id'=>'required',
    
        //    ],[
        //     'Name_ar.required'=>trans('validation.required'),
        //     'Name_class_en.required'=>trans('validation.required'),
        //     'Grade_id.required'=>trans('validation.required'),
        //    ]);
        foreach($request->List_Classes as $data){
           
            $myClass=new Classrom();
            $myClass->Name_Class=['ar'=>$data['Name_class_en'],'en'=>$data['Name_ar']];
            $myClass->Grate_id=$data['Grade_id'];
            $myClass->save();

        }
        toastr()->success(trans('messages.success'));
        return back();
       }catch(\Exception $e){
return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classrom $classrom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classrom $classrom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeClassrom $request)
    {
        $validated=$request->validated();
        
        try{
            Classrom::findOrfail($request->id)->update([
                'Name_Class'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
                'Grate_id'=>$request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return back();
        }catch(\Exception $d){
            return redirect()->back()->withErrors('ERRoRS',$d->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       classrom::findOrfail($request->id)->delete();
       toastr()->error(trans('messages.Delete'));
       return redirect()->back();
    }
    public function Delete_all(Request $request){
$array_ids=explode(',',$request->delete_all_id);
// return $request->delete_all_id;
// dd($array_ids);
Classrom::whereIn('id',$array_ids)->delete();
toastr()->error('errors','messages.Delete');
return back();
    }
    public function filter_Name(Request $request){
        $Grades=Grate::all();
     $My_Classes=Classrom::select('*')->where('Grate_id',$request->Grade_id)->get();
     return view('pages.myclasses.my_classes',compact('Grades','My_Classes')); 

    }
}
