<?php

namespace Src\Auth\Interfaces;

interface IAuthRepository
{
    public function getUserByEmail($email);
}
