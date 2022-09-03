<?php

namespace App\Actions\Interest;

use App\Exceptions;
use App\Actions;
use App\Models\{Role, User, UserInterest};

class InterestAction {

    public static function calculateInterestAndSave(array $data)
    {
        $userId = auth()->user()->id;
        $interestAmount = round(($data['principal_amount'] * $data['interest_rate'] * $data['time_period']) / 100, 2);
        $data['total_interest'] = $interestAmount;
        $data['user_id'] = $userId;
        $userInterest = UserInterest::create($data);
        return $userInterest;
    }
}
