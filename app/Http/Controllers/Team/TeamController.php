<?php

namespace App\Http\Controllers\Team;

use App\Builder\ResponseApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\CreateTeamRequest;
use App\Http\Requests\Team\DeleteTeamRequest;
use App\Http\Requests\Team\UpdateTeamRequest;
use App\Models\Teams;


class TeamController extends Controller
{

    public function create(CreateTeamRequest $request)
    {
        return ResponseApi::Success("Time criado com sucesso", Teams::create($request->validated()), 201);
    }

    public function list()
    {
        return ResponseApi::Success("Times listados com sucesso", Teams::with('players')->get(), 200);
    }
    public function update(UpdateTeamRequest $request)
    {
        return ResponseApi::Success("Time atualizado com sucesso", Teams::find($request->validated()['id'])->update($request->validated()));
    }
    public function delete(DeleteTeamRequest $request)
    {
        return ResponseApi::Success("Time deletado com sucesso", Teams::find($request->id)->delete());
    }
}
