<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RegisterRequest;
use App\Actions\Register\RegisterAction;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // $role = Role::where('name', 'User')->first();
        // if($role == null){

        // }
        // $user = User::create($request->validated());
        // $user->roles()->attach($role);
        // auth()->login($user);
        RegisterAction::registerAndSendEmailToUser($request->validated());
        return redirect('/')->with('success', "Account successfully registered.");
    }
}