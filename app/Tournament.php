<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active' ,'code' ,'name', 'description', 'address','date' ,'img','create_date','create_by'
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

}
