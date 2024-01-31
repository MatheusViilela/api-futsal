<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'shirt_number',
        'team_id'
    ];
    public function team()
    {
        return $this->belongsTo(Teams::class);
    }
}
