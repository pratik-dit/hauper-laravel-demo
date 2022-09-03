<?php

namespace App\Actions\Register;

use App\Exceptions;
use App\Actions;
use App\Models\{Role, User};

class RegisterAction {

    public static function registerAndSendEmailToUser(array $data): User
    {
        $role = Role::where('name', 'User')->first();
        $user = User::create($data);
        $user->roles()->attach($role);
        auth()->login($user);
        return $user;
    }
}
