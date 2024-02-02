<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function players()
    {
        return $this->hasMany(Players::class);
    }
    public function matches()
    {
        return $this->hasMany(Matches::class);
    }
    public function championships()
    {
        return $this->belongsTo(Championships::class);
    }
}
