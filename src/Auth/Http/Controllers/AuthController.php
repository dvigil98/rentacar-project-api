<?php

namespace Src\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Src\Auth\Interfaces\IAuthService;
use Src\Auth\Http\Requests\AuthFormRequest;

class AuthController extends Controller
{
    private $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(AuthFormRequest $request)
    {
        return $this->authService->login($request->input('email'), $request->input('password'));
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}
