<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Division extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code' ,'name','color', 'description', 'tour_id','img','create_date','create_by'
    ];


    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function players()
    {
       // return("hello");
        return $this->belongsToMany(Player::class , 'player_division', 'division_id' , 'player_id' );
    }



    public function deleteImage()
    {

        Storage::delete($this->image);
    }
}
