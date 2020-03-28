<?php

namespace App\Services;

use App\Models\User as UserModel;
use Validator;

class User {
    public function validator(array $data) {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
    }

    public function getById($userId) {
        return UserModel::find($userId);
    }
}