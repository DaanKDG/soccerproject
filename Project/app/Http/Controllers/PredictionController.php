<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prediction;
use App\Match;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    public function store(Request $request) {

        $requestData = $request->get('match');

    
        collect($requestData)
        ->each(function ($match, $key) {
            Prediction::create([
                'user_id'  => auth()->id(),
                'match_id' => $key,
                'homeTeam' => $match['homeTeamName'],
                'awayTeam' => $match['awayTeamName'],
                'homeScore'=> $match['homeTeam'],
                'awayScore'=> $match['awayTeam'],
                'result'   => false

             ]);
        });

        return view('saved');

    }

    public function showPredictions() {
        
        $user = Auth::user();

        $user->load('predictions.match'); 
          
        return view('predictions', compact('user'));
    }
}
