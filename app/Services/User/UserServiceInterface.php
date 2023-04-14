<?php
namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface {

    public function getList();
    public function find(User $user);
    public function addUser($data);
    public function editUser($data, User $user);
    public function delete(User $user);

}