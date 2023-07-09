<?php 
namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait{
    public function checkedAuth($request){
       
        if($request->type=='student'){
           
            $guardName= 'student';
            }else if($request->type=='parent'){
                $guardName= 'parnt';
            }else if($request->type=='teacher'){
                $guardName=  'teacher' ;
            }else{
                $guardName= 'web' ;
            }
            return  $guardName;
           
    }
    public function redirectToAurh($request){
    //    return $request;
   
        if($request->type=='student'){
            return redirect()->intended(RouteServiceProvider::STUDENT);
            }else if($request->type=='parnt'){
            return redirect()->intended(RouteServiceProvider::PARENT);
            }else if($request->type =='teacher'){
                // dd($request->type);
            return redirect()->intended(RouteServiceProvider::TEACHER);
            }else{
            return redirect()->intended(RouteServiceProvider::HOME);
            }
    }
}