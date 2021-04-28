<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;
use App\Division;
use App\Leaderboard;
use App\Live;
use App\Player;
use App\Tournament;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Config;

class TournamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

        return view('admin.tournaments.index')
        ->with('tournaments', Tournament::all()->sortByDesc('id'))
        ->with('live', Live::all()->first());
    }

    public function playersByDivision(Tournament $tournament, Division $division)
    {
        //dd($tournament);
       
        $players = $division->players()->where('tour_id', $tournament->id)->get();
        //dd($players);
      

       // dd( $division->name);
       return view('admin.tournaments.playersBydivision-table')
       ->with('tournament',$tournament)
       ->with('division', $division)
       ->with('players', $players);
   
    }


   
 
    public function  leaderboards(Tournament $tournament)
    {
       
        //$players = $division->players()->where('tour_id', $tournament->id)->get();
        //dd($players);
      

       // dd( $division->name);
   
        return view('admin.leaderboards.index')
        ->with('tournament',$tournament);
    }

    public function  newHome(Tournament $tournament)
    {
      

        return view('admin.tournaments.new-home')
        ->with('tournament',$tournament)
        ->with('divisions', Division::all()->where('tour_id', $tournament->id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('tournaments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTournamentRequest $request)
    {
      //  dd($request);
         // insert data to db
         $image = 'image_path';//$request->image->store('posts');
         $ldate = date('Y-m-d H:i:s');
      
        // dd($code);
        $tournament = Tournament::create([
            'code'=> '',
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'date' => $request->date,
            'img' => $image,
            'create_date' => $ldate,
            'create_by' => auth()->user()->name
        ]);
      // create code 
        $code = 'TM'.sprintf("%02d", $tournament->id );

        $tournament->update(([
            'code'=>$code,
        ]));

        //$colors =  Config::get('constants.color');

        //dd( $colors[1]);
        $classes =  Config::get('constants.class');
        // create Class demo 
            for($x = 0 ; $x < 20 ; $x++){

                $image = 'image_path';//$request->image->store('posts');
                $ldate = date('Y-m-d H:i:s');
                $tour_id = $tournament->id;
                $division = Division::create([
                    'code'=>'',
                    'color'=>$x,
                    'name' => $classes[$x],
                    'description' => $request->description,
                    'tour_id'=>$tournament->id,
                    'img' => $image,
                    'create_date' => $ldate,
                    'create_by' => auth()->user()->name
                ]);
        
                $code = $tournament->code .'C'.sprintf("%02d", $x);
        
                $division->update(([
                    'code'=>$code,
                ]));

                
            }
  

        
        
    


       

        Session()->flash('success','สร้างข้อมูลสำเร็จ');
       
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        
        $viewsLeaderboard = new Collection();
        $players = Player::all()->where('tour_id', $tournament->id)->sortBy('no');


        //dd($players->first()->divisions()->get());
        //place this before any script you want to calculate time
        $time_start = microtime(true); 
                // foreach($players as $player){

                //     $leaderboards=  $player->findLeaderboards($player->id);

                //     foreach($leaderboards as $leaderboard){

                //         $viewsLeaderboard[] =  $leaderboard;
                //     }
            
                //    }

                $time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        //    dd($execution_time);
      
       
        return view('admin.tournaments.details')
        ->with('tournament',$tournament)
         ->with('divisions', Division::all()->where('tour_id', $tournament->id))
         ->with('players',  $players)
         ->with('leaderboards', Leaderboard::all());
       
    }

          /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details(Tournament $tournament)
    {
        // dd($tournament);
        return response()->json($tournament);
        
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //return view('tournament.create')->with('tournament',$tournament);
    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setFrontLeaderboard(Request $request , Tournament $tournament)
    {
        $tournaments =  Tournament::all();


        //dd($tournament);
        foreach($tournaments as $tour){
            $tour->update(([
                'active'=>false
            ]));
        }
        
        $tournament->update(([
            'active'=>true
        ]));

        return view('home')
        ->with('tournaments', Tournament::all()->sortByDesc('id'))
        ->with('live', Live::all()->first());
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTournamentRequest $request,Tournament $tournament)
    {
        //dd($request->all());
            $tournament->update(([
                'name'=>$request->name,
                'address'=>$request->address,
                'date'=>$request->date,
                'description'=>$request->description
            ]));
    
            Session()->flash('success','แก้ไขข้อมูลสำเร็จ');

            $viewsLeaderboard = new Collection();
            $players = Player::all()->where('tour_id', $tournament->id)->sortBy('no');

            foreach($players as $player){

                $leaderboards =  $player->findLeaderboards($player->id)->where('stage' , 'S1');

                foreach($leaderboards as $leaderboard){

                    $viewsLeaderboard[] =  $leaderboard;
                }
        
               }


            //return redirect(route('tournaments.index'));
            return view('admin.tournaments.details')
                 ->with('tournament',$tournament)
                 ->with('divisions', Division::all()->where('tour_id', $tournament->id))
                ->with('players',  $players)
                ->with('leaderboards', Leaderboard::all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //$tournament->tags()->detach($tournament->post_id);
        $count =  Player::all()->where('tour_id', $tournament->id)->count();
        //dd($x);
        if(   $count = Player::all()->where('tour_id', $tournament->id)->count() != 0 ){
            Session()->flash('error', 'กรุณาลบข้อมูลผู้เข้าร่วมการแข่งขัน');
            return redirect(route('home'));
        }else{


           $divisions =  Division::all()->where('tour_id', $tournament->id);
           foreach($divisions as $division) {
            $division->delete();
           }
            $tournament->delete();
            //$tournament->deleteImage();
            Session()->flash('success', 'ลบข้อมูลสำเร็จ');
    
            return redirect(route('home'));
        }

       

      
    }


    public function genarateTime(Request $request ,Tournament $tournament)
    {

        $viewsLeaderboard = new Collection();
     
       $players = Player::all()->where('tour_id', $tournament->id)->sortBy('no');

        
       $n =  0;
      
       //dd($request->all());


       for($x = 0 ; $x< $players->count()  ; $x= $x + $request->BikePerRound ){

            for($y = 0 ;$y < $request->BikePerRound ; $y++){
                if(( $x + $y) <  $players->count() ){

                    $leaderboards =  $players[0]->findLeaderboards($players[$x + $y]->id)->where('stage' , 'S1');

                    $tt1 = strtotime ( $request->s_time )  + ($request->TimePerRound * $n); 
                    $t1 =  date('H:i:s',$tt1);
             
                     foreach($leaderboards as $leaderboard){
                         //geanrate S1 - S5 
                         $leaderboard->t1  =  $t1;
                         $leaderboard->time_pc0  =  $t1;
                         $leaderboard->save();
             
                        //  $viewsLeaderboard[] =  $leaderboard;
                     }
                }
              

                $debug[] =  $x + $y;
            }
   

        $n++;
      
        // $leaderboard[1]['t1']  = '12:20:11';
        // $leaderboard[2]['t1']  = '12:20:11';
        // $leaderboard[3]['t1']  = '12:20:11';
        // $leaderboard[4]['t1']  = '12:20:11';
       // dd($leaderboard[1]->t1);
       }
  
      // dd($debug);

        // return redirect(route('tournaments.index'));
        return redirect(route('tournaments.leaderboards' , $tournament->id));
       
    }


    public function deleteAll(Request $request , Tournament $tournament)
    {   $players = Player::all()->where('tour_id', $tournament->id)->take(50);

       // dd($tournament);
      
    
        foreach($players as $player ){
            
       
            $player->divisions()->detach($player->player_id);
            $player->delete_leaderboards($player->id);
            $player->delete();
          
            
        }
        // $view = Player::all()->count();
      
        //     dd($view);
    
       Session()->flash('success', 'ลบข้อมูลสำเร็จ');
 
       return redirect(route('tournaments.show' , $tournament->id));
    }


}
