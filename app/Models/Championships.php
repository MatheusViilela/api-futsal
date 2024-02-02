<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championships extends Model
{
    use HasFactory;

    protected $fillable = [
        'teams_id',
        'score',
        'number_of_goals',
        'number_of_victories',
        'number_of_defeats',

    ];
    public function teams()
    {
        return $this->belongsTo(Teams::class, 'teams_id');
    }
}
