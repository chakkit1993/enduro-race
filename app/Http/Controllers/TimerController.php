<?php

namespace App\Http\Controllers;
use App\Division;
use App\Leaderboard;
use App\Live;
use App\Player;
use App\Tournament;
use Illuminate\Http\Request;

class TimerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /**
     * calculateTime all record
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calculateTime(Tournament $tournament)
    {


        //dd($tournament);
            
       

        //$player_in_tournament =  Tournament::all()->players();
        $players = Player::all()->where('tour_id', $tournament->id)->sortBy('no');

        // if($player_in_tournament->count() < 0 )
        // {
        //     Session()->flash('error', 'ไม่พบข้อมูล player in tournamet');
        //     return view('admin.tournaments.index');
        // }
        



        foreach($players as $player){
            $leaderboards = $player->findLeaderboards($player->id);
            //dd($request->all());
            $s = 1;
            foreach($leaderboards as $leaderboard){

                 $tt1 = strtotime ( $leaderboard->t1); 
                 $tt2 = strtotime ( $leaderboard->t2 ); 
               
             
                
                // Set Format 
                $start_t =  date('H:i:s',$tt1);
                $finish_t =  date('H:i:s',$tt2);
              
             
                $gmtTimezone = config('app.timezone');
        
        
                // if(strtotime($ldate) > strtotime($sdate)){
    
                    $timediff = strtotime($finish_t) -  strtotime($start_t);
                    $temp =  date('H:i:s',$timediff );
                    // Covert timezone +07:00:00
                 if($timediff > 0){
    
                    $timediff2 =  date('H:i:s',  strtotime($temp) - 7*60*60);
    
                    $leaderboard['tResult'] =  $timediff2 ; 
                    
                  
                }else{
    
                    $leaderboard['tResult'] =  '00:00:00' ; 
                    // Session()->flash('error', 'ข้อมูลไม่ถูกต้อง');
                    // return redirect(route('tournaments.show',$player->tour_id));
                }
    
                $leaderboard->save();
            }
        }
        Session()->flash('success', 'คำนวณเวลา player in tournamet');
        //return view('admin.tournaments.index');
            
        // return view('admin.leaderboards.index')
        // ->with('tournament',$tournament);
        return redirect(route('tournaments.leaderboards' , $tournament->id))  
        ->with('tournament',$tournament);

          
    }
}
