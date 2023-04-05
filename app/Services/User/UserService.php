<?php
/**
* UserService class
* Author: trinhnv
* Date: 2021/01/12 10:34
*/

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function index(){
        $user = User::all();
        return $user;
    }

    public function addUser($data){
        $url_avatar = $data['avatar']->storeAs('public/avatar', $data['avatar']->getClientOriginalName());
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'avatar' => $data['avatar']->getClientOriginalName(),
            'description' => $data['description'],
            'password' => $data['password'],
        ]);
        return true;
    }

    public function editUser($data, $id){
        $input = [
            'name' => $data['name'],
            'email' => $data['email'],
            'description' => $data['description'],
            'password' => $data['password'],
        ];
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->description = $data['description'];
        $user->password = $data['password'];
        $user->save($input);
        return true;
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return true;
    }
    
}
