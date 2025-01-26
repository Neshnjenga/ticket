<?php

namespace App\Http\Controllers;

use App\Mail\Forgotmail;
use App\Models\Forgot;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Str;

class ForgotController extends Controller
{
    public function forgot(){
        return view('auth.forgot');
    }

    public function forgotpost(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        $email = $request->email;
        $token =Str::random(50);
        $created = Carbon::now();
        $emailExist = User::where('email',$email)->first();
        if($emailExist){
            $user_id = $emailExist->id;
            $tokenExist = Forgot::where('user_id',$user_id)->first();
            if($tokenExist){
                $tokenExist->token = $token;
                $tokenExist->createdAt = $created;
                $tokenExist->save();
            }
            else{
                $newToken = new Forgot();
                $newToken->user_id = $user_id;
                $newToken->token = $token;
                $newToken->createdAt = $created;
                $newToken->save();
            }
            Mail::to($email)->send(new Forgotmail($token) );
            return redirect()->back()->with('success','Reset token sent to email');
        }
    }

    public function reset($token){
        return view('auth.reset',compact('token'));
    }

    public function resetpost(Request $request,$token){
        $request->validate([
            'password'=>'required|min:8|max:20|confirmed'
        ]);

        $tokenExist = Forgot::where('token',$token)->first();
        if($tokenExist){
           if(Carbon::now()->subMinutes(5)<$tokenExist->createdAt){
            $id = $tokenExist->user_id;
            $idExist = User::where('id',$id)->first();
            $idExist->password = Hash::make($request->password);
            $idExist->save();
            return redirect(route('login'))->with('success','Password has been changed successfuly');
           }
           else{
            return redirect(route('forgot'))->with('error','Token has expired');
           }
        }
        else{
            return redirect(route('forgot'))->with('error','No such token');
        }
    }
}
