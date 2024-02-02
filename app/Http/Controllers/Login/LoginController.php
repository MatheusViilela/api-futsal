<?php

namespace App\Http\Controllers\Login;

use App\Builder\ResponseApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = auth('api')->attempt($credentials)) return ResponseApi::Error("Usuário ou senha incorretos", 401);

        $user = User::find(auth('api')->user()->id);
        return ResponseApi::Success("Login efetuado com sucesso", ["token" => $token, "user" => $user]);
    }
}
