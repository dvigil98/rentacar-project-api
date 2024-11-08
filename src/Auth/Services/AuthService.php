<?php

namespace Src\Auth\Services;

use Src\Auth\Interfaces\IAuthService;
use Src\Configs\Helpers\ApiResponse;
use Src\Auth\Interfaces\IAuthRepository;
use Src\Auth\Http\Resources\AuthenticatedUser;

class AuthService implements IAuthService
{
    use ApiResponse;

    private $authRepository;

    public function __construct(IAuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login($email, $password)
    {
        $credentials = ['email' => $email, 'password' => $password];

        $user = $this->authRepository->getUserByEmail($credentials['email']);

        if (empty($user))
            return $this->response(code: 401, message: 'Peticion erronea', errors: ['Usuario no existe']);

        if (!$user->active)
            return $this->response(code: 401, message: 'Peticion erronea', errors: ['Usuario desactivado']);

        $token = auth()->attempt($credentials);

        if (!$token)
            return $this->response(code: 401, message: 'Peticion erronea', errors: ['Credenciales invalidas']);

        return $this->response(
            code: 200,
            message: 'Sesion iniciada correctamente',
            data: [
                'user' => new AuthenticatedUser($user),
                'token_type' => 'Bearer',
                'access_token' => $token,
            ]
        );
    }

    public function logout()
    {
        auth()->logout();

        return $this->response(code: 200, message: 'Sesion finalizada correctamente');
    }
}
