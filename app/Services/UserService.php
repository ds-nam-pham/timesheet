<?php
/**
* UserService class
* Author: trinhnv
* Date: 2021/01/12 10:34
*/

namespace App\Services;

use App\Models\User;

class UserService extends AbstractService
{
    public function addUser($data){
        $url_avatar = $data['avatar']->storeAs('public/avatar', $data['avatar']->getClientOriginalName());
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => $data['avatar']->getClientOriginalName(),
            'description' => $data['description'],
            'password' => $data['password'],
        ]);
    }
    
}
