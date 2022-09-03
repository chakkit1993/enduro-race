<?php

namespace App\Exports;

use App\Division;
use App\Player;
use App\viewPlayers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithTitle;

class PlayersExport implements FromCollection,WithTitle ,WithHeadings,WithStartRow,WithCustomStartCell,WithEvents
{
    private $division;
    function __construct($param) {
           $this->division = $param;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

   /**
     * @return string
     */
    public function title(): string
    {
        return "Division";
    }
/**
     * @return string
     */
    public function startCell(): string
    {
        return 'A2';
    }




    public function headings():array
    {

        return[
            'ชื่อ',
            'หมายเลขรถ',
            //'RFID',
            'Stage',
            'Time Start',
            'Time Finish',
            'Time Result',
            //'ผลรวมS1-S5',
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
        * registerEvents    freeze the first row with headings
        * @return array
        * @author   liuml  <liumenglei0211@163.com>
        * @DateTime 2018/11/1  11:19
        */
        public function registerEvents(): array
        {
            return [
                AfterSheet::class => function(AfterSheet $event) {
                    // Merge Cells
             
               

                         $m  = 'A1:F1' ; //Merage

                        //$m = 'A'.$n.':'.'E'.$c;
                       
                        //   $c = $n+4;
                        //  $m = 'B'.$n.':'.'B'.$c;
                        $merage[] = $m;
                    
                    //dd($merage);
                    $event->sheet->getDelegate()->setMergeCells( $merage);
                    $event->sheet->getDelegate()->setCellValue('A1',  $this->division->name);
                   // $event->sheet->getDelegate()->setMergeCells(['B1:D2']);
                    // freeze the pane
                    //$event->sheet->getDelegate()->freezePane('A4');
                     // Define the column width
                    //  $widths = ['A' => 20, 'B' => 50];
                    //  foreach ($widths as $k => $v) {
                    //      // Set the column width
                    //      $event->sheet->getDelegate()->getColumnDimension($k)->setWidth($v);
                    //  }
                    // Other style requirements (set border, background color, etc.) handle the macro given in the extension, you can also customize the macro to achieve, see the official website for details
                   
                },
            ];
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
        //$views = $this->division->name;
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
                //'rfid' => $player['tag_id'],
                'stage_1'=>  $tacks[$n]['stage'],
                't1_1'=>  $tacks[$n]['t1'],
                't2_1'=> $tacks[$n]['t2'],
                //'tResult_1'=> $tacks[$n]['tResult'],
                'tAll' =>  $timeS1_S5 ,
            ];
            $n++;
            $views[] = $view;
         
            //array_push($views, $view);
           
        }
        $views = $views->sortBy('tAll');
        //dd(   $views);
        return $views ;

        //return $this->division->players()->select('name', 'no','tag_id')->findLeaderboards()->get();
        //return response()->json($this->division->players()->get());

    }
}
