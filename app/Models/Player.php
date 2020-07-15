<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * To get Full name attribute
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->last_name} {$this->first_name}";
    }

    /**
     * To save the first latter of first name in uppercase
     * @param $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    /**
     * To save the first latter of last name in uppercase
     * @param $value
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    /**
     * To save the first latter of country in uppercase
     * @param $value
     */
    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = ucfirst($value);
    }

    /**
     * Relation B/w team and player
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
       return  $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
