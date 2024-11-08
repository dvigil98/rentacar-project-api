<?php

namespace Src\Auth\Repositories;

use Src\Auth\Interfaces\IAuthRepository;
use Src\Users\Models\User;

class AuthRepository implements IAuthRepository
{
    public function getUserByEmail($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }
}
