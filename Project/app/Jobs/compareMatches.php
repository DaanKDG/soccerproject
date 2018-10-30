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

class compareMatches implements ShouldQueue
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
        $this->compareScores();
    }

    public function compareScores() {

        $matches = $this->getMatches();


        collect($matches['match'])
            ->each(function ($match, $key) {

                Prediction::updateOrCreate([
                    'match_id' => $match['match_id'],
                ],[
                    
                    // if($match['homeScore'] == 'homeScore'  && $match['awayScore'] == 'awayScore') {
                    //    'result' => true
                    // }
                ]);
        
            });
    }

    public function getMatches() {

        $finished = Match::all()->where('status', 'FINISHED');

        return $finished;

    }
}
