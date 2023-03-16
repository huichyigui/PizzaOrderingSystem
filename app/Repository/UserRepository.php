<?php
// Author: Fong Zhi Jun
namespace App\Repository;

use App\Models\User;
use App\Repository\IUserRepository;
use Illuminate\Http\Request;

class UserRepository implements IUserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
