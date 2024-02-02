<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start_match',
        'end_match',
        'team1_id',
        'team1_goals',
        'team2_id',
        'team2_goals',
        'winner_teams_id',
    ];

    public function team1()
    {
        return $this->belongsTo(Teams::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Teams::class, 'team2_id');
    }
}
