<?php

namespace App\Http\Controllers;

use App\Live;
use App\Tournament;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('tournaments', Tournament::all()->sortByDesc('id'))   
        ->with('live', Live::all()->first());
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function leaderboard()
    {
        return view('front-end.home.leaderboard');
    }
    


}
