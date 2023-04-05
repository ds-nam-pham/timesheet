<?php
namespace App\Services\User;

interface UserService {

    public function index();
    public function addUser($data);
    public function editUser($data, $id);
    public function delete($id);

}