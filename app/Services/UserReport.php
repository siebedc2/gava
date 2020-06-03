<?php

namespace App\Services;

use App\Models\UserReport as UserReportModel;
use Validator;
use Auth;

class UserReport {
    public function validator(array $data) {
        return Validator::make($data, [
            'report' => 'required',
            'user_id' => 'required'
        ]);
    }

    public function create($userId) {
        $userReport = new UserReportModel();
        $userReport->report      = "1";
        $userReport->user_id     = $userId;
        $userReport->reporter_id = Auth::id();
        $userReport->save();
        return $userReport;
    }

    public function hasAlready($userId, $reporterId) {
        return UserReportModel::where([
                ['user_id', $userId],
                ['reporter_id', $reporterId]
            ])->get()->count();
    }
}