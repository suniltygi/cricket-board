<?php

namespace App\Services;

use App\Models\Team;


class TeamService
{

    public function createTeam($data, $path)
    {
      $team = new Team();
      $team->name = $data['name'];
      $team->club_state = $data['club'];
      $team->logo = $path;
      $team->save();

      return true;
    }
}
