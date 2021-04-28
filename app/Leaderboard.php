<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'stage', 't1', 't2', 'tResult','time_pc0', 'time_pc1', 'time_pc2', 'time_pc3', 'time_pc4', 'time_pc5', 'time_pc6'
    ];


    public function players(){
        return $this->belongsTo(Player::class);
  }
  
  public function findPlayer($id)
  {
      $player = Player::where('id' , $id)->first();
      return  $player;

  }
  public function findOnePlayerTournament($tournament , $id)
  {
      $player = Player::where('id' , $id)->where('tour_id', $tournament)->first();
      return  $player;
  }

  public function findPlayerRFID($tournament,$rfid)
  {
      $tour =  Tournament::all()->where('code',$tournament)->first();


      $player = Player::where('tour_id', $tour->id)->where('tag_id' , $rfid)->first();
      return  $player;
  }

  
}
