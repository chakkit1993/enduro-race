<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlayerRequest;
use App\Player;
use App\Division;
use App\Leaderboard;
use App\Tag;
use App\Tournament;
use App\User;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.players.index')->with('players',Player::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlayerRequest $request )
    {
        //  dd($request->all());
          $image = 'image_path';//$request->image->store('posts');
 
        $ldate = date('Y-m-d H:i:s');
        $tour_id = $request->tour_id;

        $player = Player::create([
              'name' => $request->name,
              'phone' => $request->phone,
              'no'=>$request->no,
              'tag_id'=>$request->tag_id,
              'tour_id'=>$tour_id,
              'img' => $image,
              'create_date' => $ldate,
              'create_by' => auth()->user()->name
          ]);
         

          
         if ($request->division_id) {
          
        $player->divisions()->attach( $request->division_id );
        }


        for($x = 1 ; $x < 6 ;$x++){
            $leader =  Leaderboard::create([
                'player_id' => $player->id,
                't1' => '00:00:00',
                't2' => '00:00:00',
                'tResult' => '00:00:00',
                'time_pc0' => '00:00:00',
                'time_pc1' => '00:00:00',
                'time_pc2' => '00:00:00',
                'time_pc3' => '00:00:00',
                'time_pc4' => '00:00:00',
                'time_pc5' => '00:00:00',
                'time_pc6' => '00:00:00',
                
                'stage'=>'S'.$x,
               
           ]);
           
        }
      


       

           Session()->flash('success','บันทึกข้อมูลสำเร็จ' );
  
          return redirect(route('tournaments.show' , $tour_id));
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
    public function edit(Player $player)
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
    public function update(Request $request,Player $player)
    {

        // dd($request->all());
        $data = $request->only(['name', 'phone', 'no' , 'tag_id']);

        // if ($request->hasFile('image')) {

        //     $image = $request->image->store('posts');
        //     $post->deleteImage();
        //     $data['image'] = $image;
        // }

       

        if ($request->division_id) {
            $player->divisions()->sync($request->division_id);
        }

        $player->update($data);
     

        $leaderboards = $player->findLeaderboards($player->id);


         //dd($request->all());
        $s = 1;
        foreach($leaderboards as $leaderboard){
            $pc1 = 'S'.$s.'_pc1';
            $pc2 = 'S'.$s.'_pc2';
            $pc3 = 'S'.$s.'_pc3';
            $pc4 = 'S'.$s.'_pc4';
            $pc5 = 'S'.$s.'_pc5';

            $time_pc1 = 'S'.$s.'time_pc1';
            $time_pc2 = 'S'.$s.'time_pc2';
            $time_pc3 = 'S'.$s.'time_pc3';
            $time_pc4 = 'S'.$s.'time_pc4';
            $time_pc5 = 'S'.$s.'time_pc5';

            $leaderboard['pc1']  =  $request->$pc1;
            $leaderboard['pc2']  =  $request->$pc2;
            $leaderboard['pc3'] =  $request->$pc3;
            $leaderboard['pc4'] =  $request->$pc4;
            $leaderboard['pc5'] =  $request->$pc5;
           
            $t1 = 'S'.$s.'_t1';
            $t2 = 'S'.$s.'_t2';
            $leaderboard['t1']  =  $request-> $t1;
            $leaderboard['t2']  =  $request-> $t2;

            $leaderboard['time_pc0']  =  $request-> $t1;
            $leaderboard['time_pc6']  =  $request-> $t2;


            $leaderboard['time_pc1']  =  $request->$time_pc1;
            $leaderboard['time_pc2']  =  $request->$time_pc2;
            $leaderboard['time_pc3']  =  $request->$time_pc3;
            $leaderboard['time_pc4']  =  $request->$time_pc4;
            $leaderboard['time_pc5']  =  $request->$time_pc5;


            $tt1 = strtotime ( $request->$t1 ); 
            $tt2 = strtotime ( $request->$t2 ); 
    
            // Set Format 
            $sdate =  date('H:i:s',$tt1);
            $ldate =  date('H:i:s',$tt2);
          
    
            $gmtTimezone = config('app.timezone');
    
    
            // if(strtotime($ldate) > strtotime($sdate)){

                $timediff = strtotime($ldate) -  strtotime($sdate);
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
            $s++; 
           
        }
       

        Session()->flash('success', 'แก้ไขข้อมูลสำเร็จ');

        return redirect(route('tournaments.show',$player->tour_id));
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

             /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details(Player $player)
    {
        // dd($tournament);
       // $data = $player->hasDivision(2);
        //dd($divisions);
        return response()->json($player);
        
    }

    
             /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPlayers()
    {
       
        $players = Player::all();
        //dd($divisions);
        return response()->json($players);
        
    }
  

                   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function myedit(Tournament $tournament, Player $player)
    {
        //dd($tournament->id);
        return view('admin.tournaments.editForm-player')        
        ->with('player', $player)
        ->with('tournament',$tournament)
        ->with('divisions', Division::all()->where('tour_id', $tournament->id))
        ->with('leaderboards', Leaderboard::all()->where('player_id', $player->id));

    }

             /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPlayersByDivision(Tournament $tournament,  Division $division)
    {
       
         
        $players = $division->players()->where('tour_id', $tournament->id)->get();
        //dd($players);
      

       // dd( $division->name);
   
        return view('admin.players.index')
        ->with('tournament',$tournament)
        ->with('division', $division)
        ->with('players', $players);
        
    }



   

    

}
