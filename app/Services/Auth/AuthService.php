<?php
/**
* UserService class
* Author: trinhnv
* Date: 2021/01/12 10:34
*/

namespace App\Services\Auth;

use App\Mail\newPassword;
use App\Mail\SendMail;
use App\Mail\SendOtp;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthService extends BaseService implements AuthServiceInterface
{
    public function registerUser($data)
    {
        $user = User::create([
            'name' => Arr::get($data,'name'),
            'email' => Arr::get($data,'email'),
            'password' => Arr::get($data,'password'),
        ]);
        return true;
    }

    public function sendOtp($data)
    {
        $user = User::where('email', '=' ,Arr::get($data,'email'))->get();
        $otp = $this->ramdomOtp();
        if(Arr::get($data,'email')){
            Mail::to(Arr::get($data,'email'))->send(new SendOtp($otp));
            User::where('email', '=' ,Arr::get($data,'email'))->update(['otp' => $otp]);
        }
        return true;
    }

    public function newPassword($data)
    {
        $user = User::where('otp', '=' ,Arr::get($data,'otp'))->get();
        $newPassword = $this->ramdomOtp();
        if(Arr::get($user['0'],'email')){
            Mail::to(Arr::get($user['0'],'email'))->send(new newPassword($newPassword));
            User::where('email', '=' ,Arr::get($user['0'],'email'))->update([
                'password' => Hash::make($newPassword),
                'otp' => ''
            ]);
            return true;
        }
    }

    public function ramdomOtp()
    {
        $random_number = rand(0, 999999);
        $random_string = str_pad($random_number, 6, "0", STR_PAD_LEFT);
        return $random_string;
    }
}
