<?php

namespace App\Services;

use App\Models\User as UserModel;
use Validator;
use Storage;

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

    public function getCreator($creatorId) {
        return UserModel::find($creatorId);
    }

    public function edit($request, $userId) {
        $user = UserModel::find($userId);
        $user->name          = $request['name'];
        $user->email    = $request['email'];

        if(!empty($request['profile_picture'])) {
            $profilePicture = $request['profile_picture'];
            $ext = $request['profile_picture']->extension();
            $filename =  date('Y-m-d-H-i-s') . '_' . uniqid() . '.' . $ext;
            $profilePicture->move('images/uploads', $filename);
            $user->profile_picture = $filename;
        }

        $user->save();
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