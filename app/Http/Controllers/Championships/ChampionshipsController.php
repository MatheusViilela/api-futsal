<?php

namespace App\Http\Controllers\Championships;

use App\Builder\ResponseApi;
use App\Http\Controllers\Controller;
use App\Models\Championships;

class ChampionshipsController extends Controller
{
    public function list()
    {
        return ResponseApi::Success("Campeonatos listados com sucesso", Championships::with('teams')->orderBy('score', 'desc')->get(), 200);
    }
}
