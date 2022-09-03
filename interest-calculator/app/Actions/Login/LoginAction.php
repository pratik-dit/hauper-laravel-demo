<?php

namespace App\Actions\Login;

use App\Actions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\SendForgotPasswordEmail;
use Illuminate\Support\Facades\Mail;

class LoginAction {

    public static function userLogin($credentials)
    {
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $user;
    }

    public static function forgotPassword(Request $request)
    {
        $temp_password = bin2hex(openssl_random_pseudo_bytes(6));
        $user = User::where('email',$request->email)->first();
        if($user != null){
            $user->password = $temp_password;
            $user->save();

            $message['name'] = $user->name;
            $message['email'] = $user->email;
            $message['password'] = $temp_password;
            $email = new SendForgotPasswordEmail($message);
            try{
                Mail::to($request->email)->send($email);
            }catch (Exception $exception){
                
            }
        }
    }
}
