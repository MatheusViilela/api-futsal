<?php

namespace App\Http\Controllers\User;

use App\Builder\ResponseApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(UserCreateRequest $request)
    {
        return ResponseApi::Success("Usuário criado com sucesso", User::create($request->validated()), 201);
    }
}
