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
        'teams_id'
    ];
    public function teams()
    {
        return $this->belongsTo(Teams::class, 'teams_id');
    }
    
}
