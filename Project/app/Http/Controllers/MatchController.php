<?php

namespace App\Http\Controllers;
use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index() 
    {
        
        $scheduled = Match::all()->where('status', 'SCHEDULED');
        $active = Match::all()->where('status', 'IN_PLAY');
        $finished = Match::all()->where('status', 'FINISHED');
           
        return view('live', compact('scheduled', 'active', 'finished'));

    }
}
