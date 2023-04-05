<?php
/**
* UserService class
* Author: trinhnv
* Date: 2021/01/12 10:34
*/

namespace App\Services\Auth;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{
    public function registerUser($data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return true;
    }
}
