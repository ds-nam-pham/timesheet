<?php
namespace App\Services\Auth;

interface AuthServiceInterface {

    public function registerUser($data);

    public function sendOtp($data);

    public function newPassword($data);

}