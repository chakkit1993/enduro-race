<?php

use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\LeaderboardsController;
use App\Http\Controllers\PlayersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentsController;
use App\Http\Controllers\LiveController;

use App\Tournament;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front-end.home.home')->with('tournament' , Tournament::where('active', 1)->first());
    //return view('welcome');
});

// Route::post('/images', function () {
//    $disk = Storage::disk('gcs');

//    $disk->put('avatars/tests.txt','fileContents');
//     //return view('welcome');
// });

Route::get('/updateAvatarIndex', 'UserAvatarController@index');
Route::post('/updateAvatar', 'UserAvatarController@update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/leaderboard', 'HomeController@leaderboard')->name('home.board');
Route::get('/admin', 'AdminController@index')->name('admin');


Route::resource('/live-online', 'LiveController');
// Route::put('/live-online/{id}' ,[LiveController::class,'update']);
// Route::get('/live-online/{id}/edit' ,[LiveController::class,'edit']);


// Route::post('/admin/tournaments',[TournamentsController::class,'store'])->name('admin.tournaments.store');
// Route::put('/admin/tournaments/{tournament}',[TournamentsController::class,'update'])->name('tournaments.update');
// Route::patch('/admin/tournaments/{tournament}',[TournamentsController::class,'update'])->name('admin.tournaments.update');



Route::resource('/admin/tournaments','TournamentsController');
Route::get('/admin/tournaments/details/{tournament}',[TournamentsController::class,'details'])->name('tournaments.details');
Route::post('/admin/tournaments/genarate-time/{tournament}',[TournamentsController::class,'genarateTime'])->name('tournaments.genarateTime');
// Route::put('/admin/tournaments/update/{tournament}',[TournamentsController::class,'update'])->name('tournaments.update');
Route::get('/admin/tournaments/{tournament}/division/{division}',[TournamentsController::class,'playersByDivision'])->name('tournaments.playersByDivision');


Route::get('/admin/tournaments/{tournament}/leaderboards',[TournamentsController::class,'leaderboards'])->name('tournaments.leaderboards');
Route::get('/admin/tournaments/setFrontLeaderboard/{tournament}',[TournamentsController::class,'setFrontLeaderboard'])->name('tournaments.setFrontLeaderboard');


Route::delete('/admin/tournaments/{tournament}/deleteAll',[TournamentsController::class,'deleteAll'])->name('tournaments.deleteAll');


Route::get('/admin/tournaments/new-home/{tournament}',[TournamentsController::class,'newHome'])->name('tournaments.new');

Route::resource('/admin/divisions','DivisionsController');

Route::get('/admin/divisions/details/{division}',[DivisionsController::class,'details'])->name('divisions.details');
// Route::get('/admin/divisions',[DivisionsController::class,'index'])->name('admin.divisions');
// Route::get('/admin/divisions/create',[DivisionsController::class,'create'])->name('admin.divisions.create');
// Route::post('/admin/divisions','DivisionsController@create');
Route::get('admin/api/divisions',[DivisionsController::class,'getDivision'])->name('api.divisions');
Route::get('admin/api/players',[PlayersController::class,'getPlayers'])->name('api.players');



Route::resource('/admin/players','PlayersController');
Route::get('/admin/players/details/{player}',[PlayersController::class,'details'])->name('players.details');
Route::get('/admin/tournaments/{tournament}/players/{player}',[PlayersController::class,'myedit'])->name('players.myedit');
Route::get('/admin/players/player-checkpoint/{player}',[PlayersController::class,'updateCheckpoint'])->name('players.updateCheckpoint');

// Route::get('/admin/players',[PlayersController::class,'index'])->name('admin.players');
//Route::post('/admin/players/create',[PlayersController::class,'create'])->name('admin.players.create');
// Route::post('/admin/players','PlayersController@create');


Route::resource('/admin/leaderboard','LeaderboardsController');
Route::get('/leaderboard','FrontEnd\FrontEndLeaderboardController@index');





Route::get('/divisions/export/{tournament}', 'ImportExcelController@exportExcel')->name('divisions.export');
Route::get('/divisions/export/players/{division}', 'ImportExcelController@exportExcelplayers')->name('players.export');


Route::post('/admin/divisions/import/{tournament}', 'ImportExcelController@importDivision')->name('divisions.import');
Route::post('/admin/players/import/{tournament}', 'ImportExcelController@importPlayers')->name('players.import');


Route::get('/export/timer', 'ImportExcelController@exportTimer')->name('timer.export');