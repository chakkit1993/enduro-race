<?php

namespace App\Http\Controllers;

use App\Division;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DivisionsExport;
use App\Exports\PlayersExport;
use App\Exports\TimerExport;
use App\Imports\DivisionsImport;
use App\Imports\PlayersImport;
use App\Tournament;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;

class ImportExcelController extends Controller
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
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function exportExcel(Request $request , Tournament $tournament) 
    {
        // dd( $tournament ->id);
       // return (new DivisionsExport)->download('division.xlsx');
        return  Excel::download(new DivisionsExport($tournament), 'division.xlsx');
        return back();
    }

    
    public function exportExcelplayers(Request $request , Division $division) 
    {  
        //dd($division);


        //return response()->json($division->players()->get());
      
        // dd( $tournament ->id);
       // return (new DivisionsExport)->download('division.xlsx');
       $name = $division->name;
         return  Excel::download(new PlayersExport($division), $name.' playerList.xlsx');
        // return back();
    }

    
    public function exportTimer(Request $request) 
    {  
        
         return  Excel::download(new TimerExport($request), 'timer.xlsx');
        // return back();
    }
    
    public function test(Request $request) 
    {  
        
        Excel::create('Report2016', function($excel) {

            // Set the title
            $excel->setTitle('My awesome report 2016');

            // Chain the setters
            $excel->setCreator('Me')->setCompany('Our Code World');

            $excel->setDescription('A demonstration to change the file properties');

            $data = [12,"Hey",123,4234,5632435,"Nope",345,345,345,345];

            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($data, NULL, 'A3');
            });

        })->download('xlsx');
    }
    





    
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importDivision(Request $request, Tournament $tournament) 
    {
        
       // $path = $request->upload_file->getRealPath();
       //dd($tournament->name );

        Excel::import(new DivisionsImport($tournament), $request->upload_file);
           
        return back();
    }

      /**
    * @return \Illuminate\Support\Collection
    */
    public function importPLayers(Request $request, Tournament $tournament) 
    {
        $validated = $request->validate([
            'upload_file' => 'required',
        ]);
     
    

  
 

        if($validated){
            Session()->flash('success', 'ข้อมูลถูกต้อง');
            Excel::import(new PlayersImport($tournament), $request->upload_file);
        }else{
            Session()->flash('error', 'ข้อมูลไม่ถูกต้อง');
            redirect(route('tournaments.leaderboards' , $tournament->id));

        }
    //     $path = $request->upload_file->getRealPath();
        //dd( $request->upload_file );

        
           
        return back();
    }


}
