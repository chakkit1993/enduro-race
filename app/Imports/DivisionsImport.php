<?php

namespace App\Imports;

use App\Division;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DivisionsImport implements ToModel,WithStartRow
{
    private $tournamnet;
    function __construct($param) {
           $this->tournamnet = $param;
    }
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $division =  Division ::create([
            'code'=>'',
            'name' => $row[0],
            'description' => $row[1], 
            'img'=> " ",
            'tour_id'=> $this->tournamnet->id,
            'create_date' =>  date('Y-m-d H:i:s'), 
            'create_by'=> $this->tournamnet->create_by,
        ]);
        $code = $this->tournamnet->code .'C'.sprintf("%02d", $division->id);

        $division->update(([
            'code'=>$code,
        ]));

        return ;
    }
}
