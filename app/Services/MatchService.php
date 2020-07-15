<?php

namespace App\Services;

use App\Models\Match;
use App\Models\Team;
use Illuminate\Support\Carbon;

class MatchService
{
    /**
     * To Update the status of match
     * @param $data
     */
    public function updateStatus($data)
    {
        $match = Match::findOrFail($data['matchId']);
        $match->status = "1";
        $match->winner_team = $data['winnerId'];
        $match->save();

        $team = Team::findOrFail($data['winnerId']);
        $team->points = $team->points + 2;
        $team->save();
    }

    /**
     * To create the match automatic
     * @return json response
     */
    public function checkAutoMatch()
    {
        $today = Carbon::today();
        $matchs = Match::whereDate('match_date', $today)->get();
        $arr = array();
        foreach($matchs as $match){
            array_push($arr, $match['team_one']);
            array_push($arr, $match['team_two']);
        }
        $teams = Team::whereNotIn('id', $arr)->get();

        if(count($teams) > 1){
            $teams = json_decode(json_encode($teams), true);
           $match =  $this->createAutoMatch($teams, $today);

            return json_encode(['code'=>200, 'data'=>$match]);
        }else{
            return json_encode(['code'=>'400', 'meassage'=>'Sorry No Team Available For Today.']);
        }

    }

    /**
     * To create the manaul match fixture
     * @return false|data
     */
    public function createManualMatch($data)
    {
        $dayMatches = Match::whereDate('match_date', $data['match_date'])->get();
        $arr = array();
        foreach($dayMatches as $match){
            array_push($arr, $match['team_one']);
            array_push($arr, $match['team_two']);
        }

        if(in_array($data["team_one"], $arr)){
        
            return false;
        
        } else {
            $match = new Match();
            $match->team_one =   $data['team_one'];
            $match->team_two =   $data['team_two'];
            $match->match_date = $data['match_date'];
            $match->save();
            return $match;
            
         }
    }

    /**
     * To store the automatic match fixture
     * @return data
     */
    public function createAutoMatch($teams, $today)
    {
        $keys = array_rand($teams, 2 );

        $match = new Match();
        $match->team_one = $teams[$keys[0]]['id'];
        $match->team_two = $teams[$keys[1]]['id'];
        $match->match_date = $today;
        $match->save();
        return $match;


    }
}
