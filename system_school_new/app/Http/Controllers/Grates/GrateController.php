<?php

namespace App\Http\Controllers\Grates;
use App\Http\Controllers\Controller;

use App\Models\Grate;
use App\Http\Requests\storeGrades;
use Illuminate\Http\Request;
use App\Models\Classrom;

class GrateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Grate_data=Grate::all();
       return view('pages.show_grates',compact('Grate_data'));
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
    public function store(storeGrades $request)
    {
//         if(Grate::where('Name->ar',$request->Name_ar)->orWhere('Name->en','Name_en')->exists()){
// return redirect()->back()->withErrors(trans('messages.exist'));
//         }
        $validated = $request->validated();
       $Grate=new Grate();
       $Grate->Name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
      
       $Grate->Note=$request->Notes;
       $Grate->save();
      toastr()->success(trans('messages.success'), 'Congrats');
       return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Grate $grate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grate $grate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storeGrades $request, $id)
    {
        $v=$request->validated();
        Grate::findOrfail($id)->update([
            'Name'=>['ar'=>$request->Name_ar,'en'=>$request->Name_en],
            'Note'=>$request->Notes
        ]);
        toastr()->success(trans('messages.Update'), 'Congrats');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if(classrom::where('Grate_id',$request->id)->exists()){
            toastr()->error('Errors',trans('messages.followed'));
            return back();
         }
        
        Grate::destroy('id',$request->id);
        toastr()->error(trans('messages.Delete'), 'Congrats');
        return back();
    }
}
