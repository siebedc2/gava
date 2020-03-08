<?php

namespace App\Services;

use App\Models\CommentReport as CommenReportModel;
use Validator;

class CommentReport {
    public function validator(array $data) {
        return Validator::make($data, [
            'report' => 'required',
            'comment_id' => 'required'
        ]);
    }
}