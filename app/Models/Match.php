<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    /**
     * Relation B/w team one and team table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teamOne()
    {
        return $this->belongsTo(Team::class, 'team_one', 'id');
    }

    /**
     * Relation B/w team two and team table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teamTwo()
    {
        return $this->belongsTo(Team::class, 'team_two', 'id');
    }

    /**
     * Relation Between winner and team table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winnerTeam()
    {
        return $this->belongsTo(Team::class, 'winner_team', 'id');
    }
}
