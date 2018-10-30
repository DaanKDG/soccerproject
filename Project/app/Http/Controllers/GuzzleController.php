<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use App\Match;


class GuzzleController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
    } 

    public function getMatches()
    {

            $matches = Match::all()->where('status', 'SCHEDULED');
           
            return view('welcome', compact('matches'));
    }
}
