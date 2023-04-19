<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService implements UserServiceInterface
{
    public function getList(){
        return User::paginate(5);
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
            // 'password' => Hash::make(Arr::get($data,'password')),
            'password' => Arr::get($data,'password'),
        ]);
    }

    public function editUser($data,User $user){
        $user->name = Arr::get($data,'name');
        $user->email = Arr::get($data,'email');
        if (Arr::get($data,'avatar')){
            $user->avatar = Arr::get($data,'avatar')->getClientOriginalName();
        } else {
            $user->avatar = $user->avatar;
        } 
        $user->description = Arr::get($data,'description');
        $user->password = Arr::get($data,'password');
        $user->save();
        return true;
    }

    public function delete(User $user){
        return $user->delete();
    }

    public function changePassword($data, User $user)
    {
        
        if(!Hash::check(Arr::get($data,'old_password'), $user->password)){
            return false;
        }

        #Update the new Password
        User::whereId($user->id)->update([
            'password' => Hash::make(Arr::get($data,'new_password'))
        ]);
        return true;
    }
    
}
