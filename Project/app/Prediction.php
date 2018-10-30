<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = ["user_id","match_id","homeScore", "awayScore","result"];

    public function User() {

        return $this->belongsTo('App\User');
    }
    public function Match() {

        return $this->belongsTo('App\Match', 'match_id');
    }
}
