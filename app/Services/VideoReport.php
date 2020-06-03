<?php

namespace App\Services;

use App\Models\VideoReport as VideoReportModel;
use Validator;
use Auth;

class VideoReport {
    public function validator(array $data) {
        return Validator::make($data, [
            'report' => 'required',
            'video_id' => 'required'
        ]);
    }

    public function create($videoId) {
        $videoReport = new VideoReportModel();
        $videoReport->report     = "1";
        $videoReport->video_id   = $videoId;
        $videoReport->user_id    = Auth::id();
        $videoReport->save();
        return $videoReport;
    }

    public function hasAlready($videoId, $userId) {
        return VideoReportModel::where([
                ['video_id', $videoId],
                ['user_id', $userId]
            ])->get()->count();
    }
}