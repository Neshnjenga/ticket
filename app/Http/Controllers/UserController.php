<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function registerpost(Request $request){
        $request->validate([
            'name'=>'required|unique:users',
            'email'=>'required|unique:users|email',
            'password'=>'required|confirmed|min:8|max:20'
        ]);
        $user = new User();
        $otp = random_int(000000,999999);
        $expiry = Carbon::now()->addMinutes(5);
        $created = Carbon::now();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->otp = $otp;
        $user->expiryTime = $expiry;
        $user->createdAt = $created;
        $user->save();
        Mail::to($request->email)->send(new UserMail($otp));
        return redirect(route('login'))->with('success','Account created successfully');
    }

    public function otp(){
        $user_id = auth()->user()->id;
        $user = User::where('id',$user_id)->first();
        $now = Carbon::now();
        $expiry = Carbon::parse($user->expiryTime);
        $remainingTime = $now->diffInSeconds($expiry,false);
        return view('auth.otp',compact('remainingTime'));
    }

    public function otppost(Request $request){
        $request->validate([
            'otp'=>'required'
        ]);
        $otp = $request->otp;
        $otpExist = User::where('otp',$otp)->first();
        if($otpExist){
            if(Carbon::now()->subMinutes(5)<$otpExist->createdAt){
                $otpExist->isVerified = 1;
                $otpExist->save();
                return redirect(route('login'))->with('success','Account verified');
            }
            else{
                return redirect()->back()->with('error','Otp has expired create new one');
            }
        }
        else{
            return back()->with('error','No such otp');
        }
    }
    
    public function resend(){
        $user_id = auth()->user()->id;
        $user = User::where('id',$user_id)->first();
        $otp = random_int(000000,999999);
        $createdAt = Carbon::now();
        $expiry = Carbon::now()->addMinutes(5);
        $user->otp = $otp;
        $user -> createdAt =$createdAt;
        $user -> expiryTime =$expiry;
        $user->save();
        Mail::to($user->email)->send(new UserMail($otp));
        return redirect()->back()->with('success','A new otp has been sent to your email');
    }
    public function login(){
        return view('auth.login');
    }

    public function loginpost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $email = $request->email;
        $emailExist = User::where('email',$email)->first();
        if($emailExist){
            if(Hash::check($request->password,$emailExist->password)){
                auth()->login($emailExist);
                if($emailExist->isVerified==1){
                    return redirect(route('home'));
                }
                else{
                    return redirect(route('otp'))->with('error','Please verify your account');
                }
            }
            else{
                return redirect()->back()->with('error','Incorrect password');
            }
        }
        else{
            return redirect()->back()->with('error','Incorrect email');
        }
    }
}
