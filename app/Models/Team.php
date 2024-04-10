<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    // public function matches()
    // {
    //     return $this->hasMany(Matche::class);
    // }

    public function homeMatches()
    {
        return $this->hasMany(Matche::class, 'home_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(Matche::class, 'away_id');
    }
}
