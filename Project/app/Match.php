<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ["match_id", "homeTeam", "awayTeam", "status", "date", "matchday", "homeScore", "awayScore", "time"];

    public function Predictions() {

        return $this->hasMany('App\Prediction');
    }
}
