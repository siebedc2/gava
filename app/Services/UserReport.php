<?php

namespace App\Services;

use App\Models\UserReport as UserReportModel;
use Validator;

class UserReport {
    public function validator(array $data) {
        return Validator::make($data, [
            'report' => 'required',
            'user_id' => 'required'
        ]);
    }

    public function create($userId) {
        $userReport = new UserReportModel();
        $userReport->report     = "1";
        $userReport->user_id    = $userId;
        $userReport->save();
        return $userReport;
    }
}