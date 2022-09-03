<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InterestRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserInterest;
use App\Actions\Interest\InterestAction;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withSum('userInterest', 'total_interest')->whereHas("roles", function($q) { $q->where("name", 'User'); })->orderBy('id','desc')->paginate(5);

        return view('user.index', compact('users'));
    }
}