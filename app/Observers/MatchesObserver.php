<?php

namespace App\Observers;

use App\Models\Championships;
use App\Models\Matches;
use App\Models\Teams;
use Illuminate\Support\Facades\Log;

class MatchesObserver
{
    public function saved(Matches $match)
    {

        if ($match->team1_goals > $match->team2_goals) {
            $championship = Championships::where('teams_id', $match->team1_id)->first();
            $championship->update([
                'score' => $championship->score + 3,
                'number_of_goals' => $championship->number_of_goals + $match->team1_goals,
                'number_of_victories' => $championship->number_of_victories + 1,
            ]);
            $championship = Championships::where('teams_id', $match->team2_id)->first();
            $championship->update([
                'number_of_goals' => $championship->number_of_goals + $match->team2_goals,
                'number_of_defeats' => $championship->number_of_defeats + 1,
            ]);
            Matches::where('id', $match->id)->update([
                'winner_teams_id' => $match->team1_id,
            ]);
        } else if ($match->team1_goals == $match->team2_goals) {
            $championship = Championships::where('teams_id', $match->team1_id)->first();
            $championship->update([
                'score' => $championship->score + 1,
                'number_of_goals' => $championship->number_of_goals + $match->team1_goals,
            ]);
            $championship = Championships::where('teams_id', $match->team2_id)->first();
            $championship->update([
                'score' => $championship->score + 1,
                'number_of_goals' => $championship->number_of_goals + $match->team2_goals,
            ]);
        } else {
            $championship = Championships::where('teams_id', $match->team2_id)->first();
            $championship->update([
                'score' => $championship->score + 3,
                'number_of_goals' => $championship->number_of_goals + $match->team2_goals,
                'number_of_victories' => $championship->number_of_victories + 1,
            ]);
            $championship = Championships::where('teams_id', $match->team1_id)->first();
            $championship->update([
                'number_of_goals' => $championship->number_of_goals + $match->team1_goals,
                'number_of_defeats' => $championship->number_of_defeats + 1,
            ]);
            Matches::where('id', $match->id)->update([
                'winner_teams_id' => $match->team2_id,
            ]);
        }
    }
}
