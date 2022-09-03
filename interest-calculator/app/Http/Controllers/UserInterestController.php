<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InterestRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserInterest;
use App\Actions\Interest\InterestAction;

class UserInterestController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $usersInterest = UserInterest::where('user_id', $userId)->orderBy('id','desc')->paginate(5);

        return view('interest.index', compact('usersInterest'));
    }

    public function create()
    {
        return view('interest.create');
    }

    public function store(InterestRequest $request)
    {
        $data = $request->all();
        $userInterest = InterestAction::calculateInterestAndSave($data);

        return redirect()->route('interest.list')
                        ->with('success','Iterest data has been added successfully.');
    }
}