<?php
// Author: Fong Zhi Jun
namespace App\Repository;

use Illuminate\Http\Request;

interface IUserRepository
{
    public function getAllUsers();

    public function getUserById($id);

    public function deleteUser($id);
}
