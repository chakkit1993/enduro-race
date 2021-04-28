<?php

namespace App\Http\Controllers\Api;

use App\Division;
use App\Http\Controllers\Controller;
use App\Leaderboard;
use App\Player;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class PlayersApiController extends Controller
{
    public function index()
    {
        $players = Player::all();
        
        return response()->json($players);
    }

    public function playerByDivisionJSON(Request $request ,Tournament $tournament ,  Division $division)
    {
      
   

    // preparing an array
        $s = 'S1';
        $tempData =  Leaderboard::all()->where('stage', 'S1' );
        $data = new Collection();
        // $check_div = Player::find(73)->hasDivision($division ->id);
        // dd(  $check_div);
        $n =1;
        $check_div = false ;
        foreach($tempData as $_data){
         
            $player =  $_data->findOnePlayerTournament( $tournament->id,$_data->player_id );
           // return ture or false
           // $player =  Player::all()->where('id' ,$_data->player_id)->first();
           // $data[] = $_data;
            if($player != null){
                $check_div = $player->hasDivision($division->id);
                if($check_div){
                    $view =[
                        'no' =>$n++,
                        'id' =>$_data['id'],
                        'player_id' => $player['id'],
                        'name' => $player['name'],
                        'rfid' => $player['tag_id'],
                        'stage'=>  $_data['stage'],
                        't1'=>  $_data['t1'],
                        't2'=>  $_data['t2'],
                        'tResult'=>  $_data['tResult'], 
                    ];
                    $data[] = $view ;
                }
              
            }
         


            

        }

        $totalData = $division->players()->count();
        $totalFiltered = $totalData;

        


       


        // while( $row = mysqli_fetch_array($query) ) {
        //     $nestedData=[];
        //     $nestedData[] = $row["employee_name"];
        //     $nestedData[] = $row["employee_salary"];
        //     $nestedData[] = $row["employee_age"];
        //     $data[] = $nestedData;
        // }


    $json_data = [
        "draw" => intval($request['draw']),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval( $totalFiltered ),
        "data"            => $data,
        ];
    // dd($json_data);

    //$users = $query->paginate($length);
   // dd($json_data);
    return response()->json($json_data);
    }


       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $tour_id = $player->tour_id;
        $player->divisions()->detach($player->player_id);
        $player->delete_leaderboards($player->id);
        $player->delete();
        //$tournament->deleteImage();
        Session()->flash('success', 'ลบข้อมูลสำเร็จ');
 
        return redirect(route('tournaments.show' , $tour_id));
    }



}
