<?php

namespace App\Services;

use App\Models\Player;

class PlayerService
{
    /**
     * To Create the player for team
     * @param $data
     * @param $path
     * @return bool
     */
    public function createPlayer($data, $path)
    {

        $player = new Player();
        $player->team_id = $data['team'];
        $player->first_name = strip_tags($data['first_name']);
        $player->last_name = strip_tags($data['last_name']);
        $player->jersey_number = $data['jersey_number'];
        $player->country = strip_tags($data['country']);
        $player->image = $path;
        $player->matches = $data['matches'];
        $player->runs = $data['runs'];
        $player->highest_score = $data['highest_score'];
        $player->fifties = $data['fifties'];
        $player->hundreds = $data['hundreds'];
        $player->save();

        return true;

    }

}
