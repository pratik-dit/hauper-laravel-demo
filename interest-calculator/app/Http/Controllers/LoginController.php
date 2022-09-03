<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\SendForgotPasswordEmail;
use Illuminate\Support\Facades\Mail;
use App\Actions\Login\LoginAction;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = LoginAction::userLogin($credentials);

        return $this->authenticated($request, $user);
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    public function forgotPasswordShow()
    {
        return view('auth.forgot_password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $user = LoginAction::forgotPassword($request);
        return redirect()->back()->with('success', 'Successfully sent an email. Please check your inbox.');
    }
}