<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
///

class AuthenticatedSessionController extends Controller
{
    use AuthTrait;
    /**
     * Display the login view.
     */
    /////////////
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function loginForm($type){
        return view('auth.login',compact('type'));
    }
    public function login(Request $request){
        // 
    //    return $request;
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    //   dd(Auth::guard($this->checkedAuth($request))->attempt(['email'=>$request->email,'password'=>$request->password])); 
       if(Auth::guard($this->checkedAuth($request))->attempt(['email'=>$request->email,'password'=>$request->password])){
      
            // $x=strtoupper($request->type);
            // return redirect()->intended(RouteServiceProvider::$x);

        return    $this->redirectToAurh($request);

        }
        else
        return redirect()->back()->with('message','الاميل او البسورد خطاء');
       
    }
public function logout(Request $request,$type){
    // return $request;
Auth::guard($type)->logout();
$request->session()->invalidate();
$request->session()->regenerate();
return redirect('/');
}








    ////////////////////
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
