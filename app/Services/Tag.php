<?php

namespace App\Services;

use App\Models\Tag as TagModel;
use Validator;

class Tag {
    public function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required'
        ]);
    }
}