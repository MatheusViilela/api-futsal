<?php

namespace App\Observers;

use App\Models\Teams;

class TeamsObserver
{
    public function created(Teams $team)
    {
        dd($team);
        $team->championships()->create([
            'teams_id' => $team->id,
            'score' => 0,
            'number_of_goals' => 0,
            'number_of_victories' => 0,
            'number_of_defeats' => 0,
        ]);
    }
}
