<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Arr;

class UserService extends BaseService implements UserServiceInterface
{
    public function index(){
        return User::all();
    }

    public function find(User $user){
        return User::find($user->id);
    }

    public function addUser($data){
        return User::create([
            'name' => Arr::get($data,'name'),
            'email' => Arr::get($data,'email'),
            'avatar' => Arr::get($data,'avatar')->getClientOriginalName(),
            'description' => Arr::get($data,'description'),
            'password' => Arr::get($data,'password'),
        ]);
    }

    public function editUser($data,User $user){
        $user->name = Arr::get($data,'email');
        $user->email = Arr::get($data,'email');
        $user->avatar = Arr::get($data,'avatar')->getClientOriginalName();
        $user->description = Arr::get($data,'description');
        $user->password = Arr::get($data,'password');
        $user->save();
        return true;
    }

    public function delete(User $user){
        return $user->delete();
    }
    
}
