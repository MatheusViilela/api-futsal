<?php

namespace App\Http\Controllers\Matches;

use App\Builder\ResponseApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\Matches\CreateMatchRequest;
use App\Http\Requests\Matches\DeleteMatchRequest;
use App\Http\Requests\Matches\UpdateMatchRequest;
use App\Http\Requests\Team\DeleteTeamRequest;
use App\Models\Matches;

class MatchesController extends Controller
{
    public function create(CreateMatchRequest $request)
    {
        return ResponseApi::Success("Partida criada com sucesso", Matches::create($request->validated()));
    }
    public function list()
    {
        return ResponseApi::Success("Partidas listadas com sucesso", Matches::with(['team1', 'team2'])->get());
    }
    public function update(UpdateMatchRequest $request)
    {
        return ResponseApi::Success("Partida atualizada com sucesso", Matches::find($request->validated()['id'])->update($request->validated()));
    }
    public function delete(DeleteMatchRequest $request)
    {
        return ResponseApi::Success("Partida deletada com sucesso", Matches::find($request->validated()['id'])->delete());
    }
}
