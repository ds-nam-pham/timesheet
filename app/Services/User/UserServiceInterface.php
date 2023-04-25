<?php
namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface {

    public function getList($data);
    public function getUserList();
    public function addUser($data);
    public function editUser($data, User $user);
    public function delete(User $user);
    public function changePassword($data, User $user);
}