<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if($request->expectsJson())
        // return $request;
      if(Request::is(app()->getLocale().'/student/dashboard')){
        return redirect()->route('selection');
      }else if(Request::is(app()->getLocale().'/paraent/dashboard')){
        return redirect()->route('selection');
      }else if(Request::is(app()->getLocale().'/teacher/dashboard')){
        return redirect()->route('selection');
      }else{
        return redirect()->route('selection');
      }
    }
}
