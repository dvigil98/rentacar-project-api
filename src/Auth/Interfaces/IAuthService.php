<?php

namespace Src\Auth\Interfaces;

interface IAuthService
{
    public function login($email, $password);
    public function logout();
}
