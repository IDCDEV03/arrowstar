<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User_data;


class LoginController extends Controller
{
    protected $redirectTo = '/logout';

    public function login_show()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $validators=Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required'
        ]);

        if($validators->fails()){
            return redirect()->route('login.show')->withErrors($validators)->withInput();
        }else{
            if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
                if (auth()->user()->isAdmin == 1) {
                    return redirect()->intended(route('list_province'));
                }elseif (auth()->user()->isAdmin == 0) {
                    return redirect()->route('/');
                }else
                {
                    return redirect()->route('logout');
                }                   
            }else{
                return redirect()->route('login.show')->with('message','Login failed !Email/Password is incorrect !');
            }
        }       
    }

    public function logout(){  
        Auth::logout(); 
        return redirect()->route('/');       
    }
    
}
