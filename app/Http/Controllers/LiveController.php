<?php

namespace App\Http\Controllers;

use App\Live;
use App\Tournament;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front-end.home.Live-Section') 
         ->with('live', Live::all()->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Live::create([
            "src" => 'Live link',
            "active" => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      dd($request->live_link);

        Live::create([
            "src" => $request->live_link,
            "active" => true,
        ]);
        Session()->flash('success','สร้างข้อมูลสำเร็จ');
       return redirect(route('home'));
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
           //dd($request);
           $json_data = [
            "data"            => "Hello",
            ];
      
        return response()->json($json_data);
        // $lives =  Live::all();

        // if($lives < 1 ){
        //    dd($lives);
        
        // }else{
        //    dd($lives);
        // }
 
     
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
       // dd($request->live_link);
  // Validate read more on validation at https://laravel.com/docs/5.4/validation
        $validated = $request->validate([
            'live_link' => 'required',
        ]);


        if($validated) {
            
            // store
            $live = Live::findOrFail($id);
            $live->src = $request->input('live_link');
            $live->active = true;
            $live->save();

        
        }           
        
        Session()->flash('success','อัพเดตข้อมูลสำเร็จ');
        return redirect(route('home'));

        // return view('home')
        // ->with('tournaments', Tournament::all()->sortByDesc('id'))   
        // ->with('live', Live::all()->first());
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
