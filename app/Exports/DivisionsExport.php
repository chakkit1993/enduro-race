<?php

namespace App\Exports;

use App\Division;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DivisionsExport implements FromCollection,WithHeadings
{
     
   //protected $tour_id;
    private $tournamnet;
    function __construct($param) {
           $this->tournamnet = $param;
    }


    public function headings():array
    {

        return[
            'ชื่อ',
            'รายละเอียด',
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
        //dd($this->tournamnet->id);

        return Division::select('name', 'description')->where('tour_id',$this->tournamnet->id)->get();

        
       // return Division::where('tour_id',$this->id)->get();


        //return Division::all();
    }
  
  
    
}
