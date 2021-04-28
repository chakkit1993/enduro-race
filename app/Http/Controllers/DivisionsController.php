<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Division;
use App\Player;
use App\Tournament;
use Illuminate\Http\Request;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.divisions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDivisionRequest $request )
    {
        $tournament = Tournament::find($request->tour_id);
        //dd($tournament->name);
        
        $image = 'image_path';//$request->image->store('posts');
        $ldate = date('Y-m-d H:i:s');
        $tour_id = $tournament->id;
        $division = Division::create([
            'code'=>'',
            'color'=>$request->color,
            'name' => $request->name,
            'description' => $request->description,
            'tour_id'=>$tournament->id,
            'img' => $image,
            'create_date' => $ldate,
            'create_by' => auth()->user()->name
        ]);

        $code = $tournament->code .'C'.sprintf("%02d", $division->id);

        $division->update(([
            'code'=>$code,
        ]));



        Session()->flash('success','บันทึกข้อมูลสำเร็จ');

        return redirect(route('tournaments.show' , $tour_id))  
        ->with('players', Player::all()->where('tour_id', $tour_id));
    }


         /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details(Division $division)
    {
        // dd($tournament);
        return response()->json($division);
        
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
    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $tour_id = $request->tour_id;
        dd($request->all());
     
        $division->update(([
            'name'=>$request->name,
            'color'=>$request->color,
            'description'=>$request->description,
            'code'=>$request->code,
        ]));

        Session()->flash('success','แก้ไขข้อมูลสำเร็จ');
       
        return redirect(route('tournaments.show' , $tour_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
       $tour_id = $division->tour_id;
       //$tournament->tags()->detach($tournament->post_id);
       $division->delete();
       //$tournament->deleteImage();
       Session()->flash('success', 'ลบข้อมูลสำเร็จ');

       return redirect(route('tournaments.show' , $tour_id));
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDivision()
    {
        $divisions = Division::all();
        return response()->json($divisions);
    }
}
