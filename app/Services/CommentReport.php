<?php

namespace App\Services;

use App\Models\CommentReport as CommenReportModel;
use Validator;
use Auth;

class CommentReport {
    public function validator(array $data) {
        return Validator::make($data, [
            'report' => 'required',
            'comment_id' => 'required'
        ]);
    }

    public function create($commentId) {
        $commentReport              = new CommenReportModel();
        $commentReport->report      = "1";
        $commentReport->comment_id  = $commentId;
        $commentReport->user_id     = Auth::id();
        $commentReport->save();
        return $commentReport;
    }

    public function hasAlready($commentId, $userId) {
        return CommenReportModel::where([
                ['comment_id', $commentId],
                ['user_id', $userId]
            ])->get()->count();
    }
}