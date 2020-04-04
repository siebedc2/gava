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

    public function edit($request, $userId) {
        UserModel::where('id', $userId)
                    ->update(
                        [
                            'name'  => $request['name'],
                            'email' => $request['email']
                        ]
                        );
    }

    public function changePassword($request, $userId) {
        UserModel::where('id', $userId)
                    ->update(
                        [
                            'password'  => bcrypt($request['newPassword'])
                        ]
                        );
    }
}