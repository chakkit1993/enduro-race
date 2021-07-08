<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Leaderboard;
use App\Player;
use App\Tournament;
use Illuminate\Auth\Events\Failed;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LedaerboardApiController extends Controller
{
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tour_id = $request->tour_id;
       // dd($request->all());
     
        // $division->update(([
        //     'name'=>$request->name,
        //     'description'=>$request->description
        // ]));
        $leaderboard = Leaderboard::all();
        //dd($divisions);
        return response()->json($leaderboard);

        // Session()->flash('success','แก้ไขข้อมูลสำเร็จ');
       
        // return redirect(route('tournaments.show' , $tour_id));
    }


       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code )
    {
        //$tournament = Tournament::all()->where('code', $code);


        // {
        //     "tournament": "TM05",
        //     "stage": "S1",
        //     "point": "PC0",
        //     "rfid": 1,
        //     "time": "12:40:40"
        //   }

        //     dd($request->point);
        // $data = $request->state;
        // return response()->json(  $data);

        $result = false;
        $update_flag= false;

        $leaderboard  =  Leaderboard::where('stage', $request->stage)->first();
      
        $player = $leaderboard->findPlayerRFID($request->tournament, $request->rfid);

        

        if($player == null){
            // not found plyer in tournamnet
            $result = false;
            
        }
        else{
            $result = true;
            $leader = $leaderboard->where('player_id',  $player->id)->first();
            $point =  $request->point;
            switch ($point) {
                case 'START':
                    $update_flag = true;
                    $leader['t1']  =  $request->time;
                    $leader['time_pc0']  =   $request->time;
                    $leader['pc0'] = 1;
                  break;
                case 'PC1':
                    $leader['time_pc1']  =  $request->time;
                    $leader['pc1'] = 1;
                  break;
                case 'PC2':
                    $leader['time_pc2']  =   $request->time;
                    $leader['pc2'] = 1;
                    break;
                case 'PC3':
                    $leader['time_pc3']  =   $request->time;
                    $leader['pc3'] = 1;
                    break;
                case 'PC4':
                    $leader['time_pc4']  =   $request->time;
                    $leader['pc4'] = 1;
                    break;
                case 'PC5':
                    $leader['time_pc5']  =   $request->time;
                    $leader['pc5'] = 1;
                    break;
                case 'FINISH':
                    $update_flag = true;
                    $leader['t2']  =   $request->time;
                    $leader['time_pc6']  =  $request->time;
                    $leader['pc6'] = 1;
                    break;
                default:
                    $leader['pc1'] = 0;
              }



              if($update_flag == true)
              {
                $tt1 = strtotime (  $leader['t1'] ); 
                $tt2 = strtotime (  $leader['t2'] ); 
        
                // Set Format 
                $sdate =  date('H:i:s',$tt1);
                $ldate =  date('H:i:s',$tt2);
            
                // if(strtotime($ldate) > strtotime($sdate)){
  
                    $timediff = strtotime($ldate) -  strtotime($sdate);
                    $temp =  date('H:i:s',$timediff );
                    // Covert timezone +07:00:00
                if($timediff > 0){
  
                    $timediff2 =  date('H:i:s',  strtotime($temp) - 7*60*60);
  
                    $leader['tResult'] =  $timediff2 ; 
                    
                
                }else{
  
                    $leader['tResult'] =  '00:00:00' ; 
                    // Session()->flash('error', 'ข้อมูลไม่ถูกต้อง');
                    // return redirect(route('tournaments.show',$player->tour_id));
                }
              }

             




            $leader->save();
            }

            
         $_result = "failed";

        if($result == true){
            $_result = "success";
        }

        $json_data = [
            'player'=> $player->name,
            'tournament' => $request->tournament,
            'rfid' => $request->rfid,
            'stage'=> $request->stage,
            'point'=> $request->point,
            'time'=> $request->time,
            'result' =>  $_result,
        ];
        //response()->json(['error' => 'invalid'], 401);
        return response()->json( $json_data, 200);





        //return response()->json($tournament);
    }

          /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAll(Request $request , $id)
    {


        //return response()->json($request->data);
        $totalData =   count($request->data);
        $c_fails = 0;
        $c_success = 0;
        for($i = 0 ; $i<$totalData ; $i++){

            $leaderboard  =  Leaderboard::where('stage', $request->data[$i]['stage'])->first();

           
            $player = $leaderboard->findPlayerRFID($request->data[$i]['tournament'], $request->data[$i]['rfid']);
            if($player == null){
                // not found plyer in tournamnet
                $c_fails++;
                continue;
            }
            else{
                $c_success++;
                $leader = $leaderboard->where('player_id',  $player->id)->first();
                $point =  $request->data[$i]['point'];
                switch ($point) {
                    case 'START':
                        $leader['t1']  =  $request->data[$i]['time'];
                        $leader['time_pc0']  =  $request->data[$i]['time'];
                        $leader['pc0'] = 1;
                      break;
                    case 'PC1':
                        $leader['time_pc1']  =  $request->data[$i]['time'];
                        $leader['pc1'] = 1;
                      break;
                    case 'PC2':
                        $leader['time_pc2']  =  $request->data[$i]['time'];
                        $leader['pc2'] = 1;
                        break;
                    case 'PC3':
                        $leader['time_pc3']  =  $request->data[$i]['time'];
                        $leader['pc3'] = 1;
                        break;
                    case 'PC4':
                        $leader['time_pc4']  =  $request->data[$i]['time'];
                        $leader['pc4'] = 1;
                        break;
                    case 'PC5':
                        $leader['time_pc5']  =  $request->data[$i]['time'];
                        $leader['pc5'] = 1;
                        break;
                    case 'FINISH':
                        $leader['t2']  =  $request->data[$i]['time'];
                        $leader['time_pc6']  =  $request->data[$i]['time'];
                        $leader['pc6'] = 1;
                        break;
                    default:
                        $leader['pc1'] = 0;
                  }
    
                $leader->save();
    
            } 

          
            $views[]=  $leader ;
        }

     //   $leaderboard->save();
//
        //$tour_id = $request->tour_id;
        //dd($request->all());
        
        //$leaderboards = Leaderboard::all()->where('stage',$request->stage);
        // dd($request->all());
        $s = 1;
   
        $json_data = [
          
                    'c_total' =>$totalData,
                    'c_success' =>$c_success,
                    'c_fails' => $c_fails,
                    'result' => 'success',
        ];
        //response()->json(['error' => 'invalid'], 401);
        return response()->json( $json_data, 200);
   
        //dd($divisions);
       // return response()->json(  $views  );

        // Session()->flash('success','แก้ไขข้อมูลสำเร็จ');
       
        // return redirect(route('tournaments.show' , $tour_id));
    }


    public function getFrontLeaderboardJSON(Request $request)
    {

    $totalData = Leaderboard::all()->where('stage', 'S1' )->count();
    $totalFiltered = $totalData;



    // preparing an array
        $s = 'S1';
        $tempData =  Leaderboard::all()->where('stage', 'S1' )->sortByDesc('t2');
        $data = new Collection();
        $tournament=  Tournament::where('active', 1)->first();
      

      

        $n = 1;
        foreach($tempData as $_data){
            
            $player =  $_data->findOnePlayerTournament( $tournament->id,$_data->player_id );
           // $player =  Player::all()->where('id' ,$_data->player_id)->first();
           // $data[] = $_data;
            if($player != null){
                if($_data['t1'] != "00:00:00" &&  $_data['t2'] != "00:00:00"  && $_data['tResult'] != "00:00:00"){
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
                        'pc'=>  [ 'pc1' => $_data['pc1'],
                                'pc2' => $_data['pc2'],
                                'pc3' => $_data['pc3'],
                                'pc4' => $_data['pc4'],
                                'pc5' => $_data['pc5'],
                            ],
                    ];
                    $data[] = $view ;
                }
              
               
            }
         


            

        }

       


    $json_data = [
        "draw" => intval($request['draw']),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval( $totalFiltered ),
        "data"            => $data,
        ];


     //dd($json_data);
    return response()->json($json_data);

    }




}
