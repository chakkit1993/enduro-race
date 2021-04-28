<?php

namespace App\Http\Controllers\Api;

use App\Division;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DivisionContorller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();
        
        return response()->json($divisions);
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        //dd($code);
        $division = Division::all()->where('code', $code);
        return response()->json($division);
    }
}
