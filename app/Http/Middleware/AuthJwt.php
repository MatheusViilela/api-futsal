<?php

namespace App\Http\Middleware;

use App\Builder\ResponseApi;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class AuthJwt
{
    /**
     
Handle an incoming request.*
@param  \Illuminate\Http\Request  $request
@param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
@return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = FacadesJWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWtAuth\Exceptions\TokenInvalidException) {
                return ResponseApi::messageResponse(true, "Faça login para acessar o sistema", "Auth token invalid", null, 401);
            } else if ($e instanceof \Tymon\JWtAuth\Exceptions\TokenExpiredException) {
                return ResponseApi::messageResponse(true, "Faça login para acessar o sistema", "Auth token expired", null, 401);
            } else {
                return ResponseApi::messageResponse(true, "Token de autorização não informado", "Auth token not found", null, 401);
            }
        }
        return $next($request);
    }
}
