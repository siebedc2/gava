<?php

namespace App\Services;

use App\Models\Subcomment as SubcommentModel;
use Validator;

class Subcomment {
    public function validator(array $data) {
        return Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);
    }
}