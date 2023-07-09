<?php

namespace App\Http\Controllers;

use App\Models\Grate;
use App\Models\Section;
use App\Models\Classrom;
use App\Models\teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_Grades=Grate::with(['sections'])->get();
        $Grade_data=Grate::all();
        $teachers=teacher::all();
    //    return $list_Grades;
        return view('pages.sections.sections',compact('list_Grades','Grade_data','teachers'));
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
    public function store(Request $request)
    { 	 	
        // return $request->teacher_id; 	 		
        $sec=new Section();
        $sec->section_name=['ar'=>$request->Name_Section_Ar,'en'=>$request->Name_Section_En];
        $sec->status=1;
        $sec->Grate_id=$request->Grade_id;
        $sec->class_id=$request->Class_id;
       
     
        $sec->save();
        $sec->teacher()->attach($request->teacher_id);
        toastr()->success(trans('messages.success'));
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        // section::findOrfail($request->id)->updated([
        //     'section_name'=>['ar'=>$request->Name_Section_Ar,'en'=>$request->Name_Section_En],
        //     'Grate_id'=>$request->Grade_id,
        //     'class_id'=>$request->Class_id,
          
        // ]);
        $d=section::findOrfail($request->id);
        $d->section_name=['ar'=>$request->Name_Section_Ar,'en'=>$request->Name_Section_En];
        $d->Grate_id=$request->Grade_id;
        $d->class_id=$request->Class_id;
        if(!isset($request->Status))    
        $d->status=2;
        else
        $d->status=1;
        if(isset($request->teacher_id))
        $d->teacher()->sync($request->teacher_id);
        else  
         $d->teacher()->sync(array());

        
        $d->save();
        toastr()->success('messages.Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // return $request;
        section::findOrfail($request->id)->delete();
        toastr()->error('errors','messages.Delete');
                return redirect()->back();
        
    }
    public function classroms($id){
        $data=Classrom::where('Grate_id',$id)->pluck('Name_Class','id');
        return $data;
    }
}
