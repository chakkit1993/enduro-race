<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class viewPlayers extends Model
{
         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'no','tag_id'
    ];
}
