<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class TimerExport implements FromCollection,WithHeadings,WithEvents
{

    private $division;
    private $timeStart;
    private $count;
    private $TimePerRound;
    private $BikePerRound;
    
    function __construct($param) {
           $this->division = $param->division;
           $this->timeStart = $param->s_time;
           $this->count = $param->count + 10;
           $this->TimePerRound = $param->TimePerRound;
           $this->BikePerRound = $param->BikePerRound;
    }
    public function headings():array
    {

        return[
            'หมายเลขรถ',
            'เวลา',
        ];

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
             
                    for($n = 2 ; $n < $this->count ; $n = $n+$this->BikePerRound){
                        $c =  $n+$this->BikePerRound-1;

                        // $m  = 'BX : BY' ; Merage

                        $m = 'B'.$n.':'.'B'.$c;
                       
                        //   $c = $n+4;
                        //  $m = 'B'.$n.':'.'B'.$c;
                        $merage[] = $m;
                    }
                    //dd($merage);
                    $event->sheet->getDelegate()->setMergeCells($merage);
                   // $event->sheet->getDelegate()->setMergeCells(['B1:D2']);
                    // freeze the pane
                    //$event->sheet->getDelegate()->freezePane('A4');
                    // Set the cell content centered
                    $event->sheet->getDelegate()->getStyle('A1:A'.($this->count + 10))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $event->sheet->getDelegate()->getStyle('B1:B'.($this->count + 10))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    // Define the column width
                    $widths = ['A' => 20, 'B' => 50];
                    foreach ($widths as $k => $v) {
                        // Set the column width
                        $event->sheet->getDelegate()->getColumnDimension($k)->setWidth($v);
                    }
                    // Other style requirements (set border, background color, etc.) handle the macro given in the extension, you can also customize the macro to achieve, see the official website for details
                   
                },
            ];
        }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $views = new Collection();
        
        $n =  0;
        for($x = 1 ; $x<  $this->count ; $x= $x + $this->BikePerRound ){

            $tt1 = strtotime (  $this->timeStart )  + ( $this->TimePerRound * $n); 
            $t1 =  date('H:i:s',$tt1);

            for($y = 0 ;$y <  $this-> BikePerRound ; $y++){

                $data = [  $x + $y,  $t1];

                $debug[] =  $x + $y;
                $views[] = $data;
            }

          
          

            $n++;
   
        }
 


        // for($x = 1 ; $x <= $this->count ; $x++){
         
        // }
        //dd($views);
       
        
        return $views ;
    }
}
