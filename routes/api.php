<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LedaerboardApiController;
use App\Http\Controllers\Api\PlayersApiController;
use App\Http\Controllers\Api\TournamentContorller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



 Route::get('/divisions','Api\DivisionContorller@index')->name('api.divisons');
 Route::get('/divisions/{code}','Api\DivisionContorller@show')->name('api.divisons.find');
 Route::get('/players','PlayersController@getPlayers')->name('admin.playersJSON');

 Route::get('/tournaments','Api\TournamentController@index')->name('api.tournaments');
 Route::get('/tournaments/{code}','Api\TournamentController@show')->name('api.tournaments.find');

 Route::put('/leaderboards/{code}',[LedaerboardApiController::class,'update'])->name('api.update.leaderboards');




 Route::get('admin/leaderboards',[LedaerboardApiController::class,'index'])->name('api.leaderboards');
 Route::get('admin/frontleaderboards',[LedaerboardApiController::class,'getFrontLeaderboardJSON'])->name('api.front-leaderboards');


Route::put('admin/leaderboards/update/{id}',[LedaerboardApiController::class,'updateAll'])->name('api.UpdateAllleaderboards');




Route::get('admin/{tournament}/leaderboard','LeaderboardsController@getLeaderboardJSON');

Route::get('admin/tournament/{tournament}/division/{division}',[PlayersApiController::class,'playerByDivisionJSON'])->name('api.playerBydivision');
Route::delete('admin/tournament/{tournament}/player/{player}',[PlayersApiController::class,'destroy'])->name('api.playersDestroy');



