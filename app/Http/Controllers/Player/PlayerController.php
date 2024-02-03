<?php

namespace App\Http\Controllers\Player;

use App\Builder\ResponseApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\Player\CreatePlayerRequest;
use App\Http\Requests\Player\DeletePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Models\Players;


class PlayerController extends Controller
{
    public function create(CreatePlayerRequest $request)
    {
        return ResponseApi::Success("Jogador criado com sucesso", Players::create($request->validated()), 201);
    }
    public function list()
    {
        return ResponseApi::Success("Jogadores listados com sucesso", Players::with('teams')->get(), 200);
    }
    public function update(UpdatePlayerRequest $request)
    {
        return ResponseApi::Success("Jogador atualizado com sucesso", Players::find($request->validated()['id'])->update($request->validated()));
    }
    public function delete(DeletePlayerRequest $request)
    {
        return ResponseApi::Success("Jogador deletado com sucesso", Players::find($request->validated()['id'])->delete());
    }
}
