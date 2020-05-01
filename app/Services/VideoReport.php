<?php

namespace App\Services;

use App\Models\VideoReport as VideoReportModel;
use Validator;

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
        $videoReport->save();
        return $videoReport;
    }
}