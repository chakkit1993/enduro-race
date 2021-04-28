<?php

namespace App\Exports;

use App\Division;
use App\Player;
use App\viewPlayers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class PlayersExport implements FromCollection,WithHeadings
{
    private $division;
    function __construct($param) {
           $this->division = $param;
    }

 

        



    public function headings():array
    {

        return[
            'ชื่อ',
            'หมายเลขรถ',
            'rfid',
            'Stage',
            'TStart',
            'TFinish',
            'TResult',
            'Stage',
            'TStart',
            'TFinish',
            'TResult',
            'Stage',
            'TStart',
            'TFinish', 
            'TResult',
            'Stage',
            'TStart',
            'TFinish',
            'TResult',
            'Stage',
            'TStart',
            'TFinish',
            'TResult',
            'ผลรวมS1-S5',
        ];

        // return[
        //     'Name',
        //     'Descirption',
        //     'ImagePath',
        //     'Tournament',
        //     'CreateDate',
        //     'CreateBy',
        // ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $players = $this->division->players()->get();

       //dd($players);
        $views = new Collection();

        $n  = 0;
        foreach($players as $player){
            //$leaderboard = $player->findLeaderboards($player->id)->where('stage','S1')->first();
            $leaderboards = null;
            $leaderboards = $player->findLeaderboards($player->id);
           
            $timeS1_S5 = '00:00:00';
     
      
            foreach($leaderboards as $leaderboard){
              
                $tack = [  
                    'stage'=>  $leaderboard['stage'],
                    't1'=>   $leaderboard['t1'],
                    't2'=>  $leaderboard['t2'],
                    'tResult'=>  $leaderboard['tResult'],
                  ];
                 

                   $secs = strtotime($tack['tResult'])-strtotime("00:00:00");
                   $timeS1_S5 = date("H:i:s",strtotime($timeS1_S5)+$secs);   
                   
                
                  $tacks[] =  $tack;

            }
           

          
            $view =[
                'name' => $player['name'],
                'no' => $player['no'],
                'rfid' => $player['tag_id'],
                'stage_1'=>  $tacks[$n]['stage'],
                't1_1'=>  $tacks[$n]['t1'],
                't2_1'=> $tacks[$n]['t2'],
                'tResult_1'=> $tacks[$n]['tResult'],
                'stage_2'=>  $tacks[$n+1]['stage'],
                't1_2'=>  $tacks[$n+1]['t1'],
                't2_2'=> $tacks[$n+1]['t2'],
                'tResult_2'=>  $tacks[$n+1]['tResult'],
                'stage_3'=>  $tacks[$n+2]['stage'],
                't1_3'=>  $tacks[$n+2]['t1'],
                't2_3'=> $tacks[$n+2]['t2'],
                'tResult_3'=>  $tacks[$n+2]['tResult'],
                'stage_4'=>  $tacks[$n+3]['stage'],
                't1_4'=>  $tacks[$n+3]['t1'],
                't2_4'=> $tacks[$n+3]['t2'],
                'tResult_4'=>  $tacks[$n+3]['tResult'],
                'stage_5'=>  $tacks[$n+4]['stage'],
                't1_5'=>  $tacks[$n+4]['t1'],
                't2_5'=> $tacks[$n+4]['t2'],
                'tResult_5'=>  $tacks[$n+4]['tResult'],
                'tAll' =>  $timeS1_S5 ,
            ];

            $n = $n+5;
            $views[] = $view;
         
            //array_push($views, $view);
           
        }
        
        dd(   $views);
        return $views ;

        //return $this->division->players()->select('name', 'no','tag_id')->findLeaderboards()->get();
        //return response()->json($this->division->players()->get());

    }
}
