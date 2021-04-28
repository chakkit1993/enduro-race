<?php

namespace App;

use App\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'no','tag_id','tour_id','img','create_date','create_by'
    ];

    public function divisions()
    {
      // return ("division");
        return $this->belongsToMany(Division::class , 'player_division' , 'player_id' , 'division_id');
    }

   


    public function hasDivision($divisionId)
    {
        return in_array($divisionId,$this->divisions->pluck('id')->ToArray());
    }

    public function findPlayer($id)
    {
        $player = Player::find($id);
        return  $player;
    }

  

    // public function checkpoints()
    // {
    //     return $this->belongsToMany(Checkpoint::class);
    // }
    public function leaderboards()
    {
        return $this->hasMany(Leaderboard::class);
    }

    public function findLeaderboard($player_id , $stage)
    {
        $leaderboard = Leaderboard::all()->where('player_id', $player_id )->where('stage', $stage )->first();;
        return  $leaderboard;
    }

    public function findLeaderboards($player_id)
    {
        $leaderboards = Leaderboard::all()->where('player_id', $player_id );
        return  $leaderboards;
    }

    public function findLeaderboardS1($player_id)
    {
        $leaderboard = Leaderboard::all()->where('player_id', $player_id )->where('stage', 'S1' )->first();
        return response()->json($leaderboard);
       // return  $leaderboard;
    }

    
    public function   delete_leaderboards($player_id)
    {
        
        $leaderboards = Leaderboard::all()->where('player_id', $player_id );
        foreach($leaderboards as $leaderboard){
            $leaderboard->delete();
        }
        return;
    }



}
