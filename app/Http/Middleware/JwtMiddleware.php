<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Src\Configs\Helpers\ApiResponse;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;

class JwtMiddleware
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return $this->response(code: 401, message: 'Peticion erronea', errors: ['Token invalido']);
            } else if ($e instanceof TokenExpiredException) {
                return $this->response(code: 401, message: 'Peticion erronea', errors: ['Token expirado']);
            } else {
                return $this->response(code: 401, message: 'Peticion erronea', errors: ['Token no encontrado']);
            }
        }

        return $next($request);
    }
}