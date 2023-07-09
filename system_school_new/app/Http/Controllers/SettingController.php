<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadAtchhment;
use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadAtchhment;
     public function index(){
        $seetingCollection=setting::all();
        $setting['setting']= $seetingCollection->flatMap(function( $seetingCollection){
            return [$seetingCollection->key=>$seetingCollection->value];
        });
        return view('pages.settings.index',$setting);
     }
     public function update(Request $request){
        try{
        $info=$request->except('_token','_method','logo');
        foreach($info as $kay=>$value){
            setting::where('key',$kay)->update(['value'=>$value]);
        }
        if($request->hasFile('logo')){
            $logo_name = $request->file('logo')->getClientOriginalName();
            // return $logo_name;
            $x=setting::where('key','logo')->first();
           
            $this->DeleteFile($x->value,'logo');
            // return $x->value;
            setting::where('key','logo')->update(['value'=>$logo_name]);
            $this->uploaddeFile($request,'logo','logo');
        }

toastr()->success(trans('massages.Update'));
return back();}catch(\Exception $e){
    return redirect()->back()->with(['error'=>$e->getMessage()]);
}
     }
}
