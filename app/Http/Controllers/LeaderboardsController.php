<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leaderboard;
use App\Player;
use App\Tournament;
use Illuminate\Database\Eloquent\Collection;
class LeaderboardsController extends Controller
{

    private $oldLeader = null;
    private $newLeader = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$leaderboards = Leaderboard::all();
        //return response()->json($leaderboards);
        // $data =  Leaderboard::all()->where('stage' , 'S1')->take(50);
    
       return view('admin.leaderboards.index') ;
    

 



    }

    public function getLeaderboardJSON(Request $request ,Tournament $tournament)
    {

    $totalData = Leaderboard::all()->where('stage', 'S1' )->count();
    $totalFiltered = $totalData;



    // if there is a search parameter, $requestData['search']['value'] contains search parameter
    // if(!empty($request['search']['value'])) {
    //            $query->where(function($query) use ($searchValue) {
    //             $query->where('id', 'like', '%' . $searchValue . '%')
    //             ->orWhere('stage', 'like', '%' . $searchValue . '%');
    //         });
    // }

    // $query = mysqli_query($conn, $sql) or die("query filed: get employees");
    // $totalFiltered = mysqli_num_rows($query);
    // $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]
    //     ."   ".$requestData['order'][0]['dir']
    //     ."  LIMIT ".$requestData['start']." ,"
    //     .$requestData['length']."   ";
    // $query = mysqli_query($conn, $sql) or die("query filed: get employees");



    // preparing an array
        $s = 'S1';
        //$tempData =  Leaderboard::all()->where('stage', 'S1' );
        //$tempData =  Leaderboard::all()->where('stage', 'S1' )->sortByDesc('tag_id');
        $data = new Collection();

        $tempData =  Leaderboard::all()->where('tour_id', $tournament->id );
        $n = 1;
        foreach($tempData as $_data){
            
            $player =  $_data->findOnePlayerTournament( $tournament->id,$_data->player_id );
           // $player =  Player::all()->where('id' ,$_data->player_id)->first();
           // $data[] = $_data;
            if($player != null){
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

       

        // if($this->oldLeader== null){
        //     $this->oldLeader  =  $data;
          
        // }

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
     //dd($json_data);

    //$users = $query->paginate($length);
   // dd($json_data);
    return response()->json($json_data);


    //    $leaderboards = Leaderboard::all();
    //    return response()->json($leaderboards);
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
    //     $data = $request->only(['player_id', 'stage', 't1' , 't2']);
    //     //Convert String To Time
    //     $t1 = strtotime ( $request->t1 ); 
    //     $t2 = strtotime ( $request->t2 ); 

    //     // Set Format 
    //     $sdate =  date('H:i:s',$t1);
    //     $ldate =  date('H:i:s',$t2);
      

    //     $gmtTimezone = config('app.timezone');


    //     $timediff = strtotime($ldate) -  strtotime($sdate);
    //     $temp =  date('H:i:s',$timediff );
    //     // Covert timezone +07:00:00
    //     $timediff2 =  date('H:i:s',  strtotime($temp) - 7*60*60);


    //     $leader =  Leaderboard::create([
    //         'player_id' => $request->player_id,
    //         't1' => $request->t1,
    //         't2' => $request->t2,
    //         'tResult' => $timediff2,
    //         'stage'=>$request->stage,
           
    //    ]);

    //    $tour_id =  $leader->findPlayer( $leader->player_id)->tour_id;
        

        
      
        //dd(  $sdate.'end = '. $ldate.' diff '.$timediff2 .' => '.$temp);

        
        // Session()->flash('success','บันทึกข้อมูลสำเร็จ' );
  
        // return redirect(route('tournaments.show' , $tour_id));

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
}
