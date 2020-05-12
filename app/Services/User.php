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

    public function getCreator($creatorId) {
        return UserModel::find($creatorId);
    }

    public function edit($request, $userId) {
        $user = UserModel::find($userId);
        $user->name          = $request['name'];
        $user->email    = $request['email'];

        if(!empty($request['profile_picture'])) {
            $profilePicture       = $request['profile_picture'];
            $profilePictureName   = $profilePicture->getClientOriginalName();
            $profilePicture->move('images/uploads', $profilePictureName);
            $user->profile_picture       = $profilePictureName;
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