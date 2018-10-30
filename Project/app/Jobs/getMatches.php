<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client;
use App\Match;
use DateTime;

class getMatches implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->saveMatches();
    }
    
    public function saveMatches()
    {
        $matches = $this->getMatches();

        collect($matches['matches'])
            ->each(function ($match, $key) {
                $date = new DateTime($match['utcDate']);
                Match::create([
                    'match_id' => $match['id'],
                    'homeTeam' => $match['homeTeam']['name'],
                    'awayTeam' => $match['awayTeam']['name'],
                    'status'   => $match['status'],
                    'date'     => $date->format('Y-m-d'),
                    'time'     => $date->format('H:i'),
                    'matchday' => $match['matchday'],
                    'homeScore'=> $match['score']['fullTime']['homeTeam'],
                    'awayScore'=> $match['score']['fullTime']['awayTeam']
                ]);
            });

           
    }
    public function getMatches()
    {
        $client = new Client();
        $uri = 'http://api.football-data.org/v2/competitions/PL/matches/?matchday=12&season=2018&matches';
        $header = ['headers' => ['X-Auth-Token' => '6e6a87e2f21340fb837874fbe8cf6c1b']];
        $res = $client->get($uri, $header);
        return json_decode($res->getBody()->getContents(), true);
    }
}
