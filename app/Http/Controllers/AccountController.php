<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AccountController extends Controller
{
    public function register(){
        return view('account.register');
    }

    public function processRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=> 'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'required',
        ]);

        if($validator->fails()){
            return redirect()->route('account.register')->withInput()->withErrors($validator);
        }
        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =Hash::make($request->password) ;
        $user->save();

        return redirect()->route('account.login')->with('success','you have registered successfully');
    }

    public function login(){
        return view('account.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->route('account.login')->withErrors($validator);
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
         return redirect()->route('account.profile');
        } else{
            return redirect()->route('account.login')->with('error','Either email/password is incorrect');
        }
    }
    
    public function profile(){
        $user= User::find(Auth::user()->id);
        // dd($user);
        return view('account.profile',[
            'user'=>$user
        ]);
    }

    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=> 'required|min:3',
            'email'=>'required|email|unique:users,email,'.Auth::user()->id.',id',
        ]);

        if($validator->fails()){
            return redirect()->route('account.profile')->withInput()->withErrors($validator);
        }
        $user=User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('account.profile')->with('success','your profile updated successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
