<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

//home
Route::get('/home', 'HomeController@index')->name('home');

//manual
Route::get('manual', 'ManualController@index');
Route::get('character', 'ManualController@character');
Route::get('economics', 'ManualController@economy');
Route::get('gameworld', 'ManualController@gameworld');
Route::get('roles', 'ManualController@roles');
Route::get('military', 'ManualController@units');
Route::get('warfare', 'ManualController@warfare');

//news
Route::get('news', 'NewsController@index');
Route::get('rules', 'NewsController@rules');
Route::get('terms', 'NewsController@terms');
Route::get('privacy', 'NewsController@privacy');
//users account
Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@show');
Route::patch('users/{user}', 'UserController@update');
Route::delete('users/{user}', 'UserController@destroy');

//forum
//forum main
Route::get('forum', 'ForumController@index');
//forum thread
Route::get('forum/create','ForumController@create');
Route::post('forum','ForumController@store');
Route::get('forum/thread/{thread}', 'ForumController@thread');
Route::delete('forum/{thread}', 'ForumController@destroy');
//forum post
Route::get('forum/{forum}/edit', 'ForumController@edit');
Route::patch('forum/{forum}', 'ForumController@update');
//subforum
Route::get('forum/open','ForumController@open');
Route::get('forum/tavern','ForumController@tavern');
Route::get('forum/intro','ForumController@intro');
Route::get('forum/faction','ForumController@faction');
Route::get('forum/region','ForumController@region');
Route::get('forum/war','ForumController@war');

//gameplay
//armies
Route::get('armies', 'ArmyController@index');
Route::get('armies/create','ArmyController@create');
Route::post('armies','ArmyController@store');
Route::get('armies/{armies}', 'ArmyController@show');
Route::get('armies/{armies}/edit', 'ArmyController@edit');
Route::delete('armies/{armies}', 'ArmyController@destroy');
Route::patch('armies/{armies}', 'ArmyController@update');
//battles
Route::get('battles', 'BattleController@index');
Route::get('battles/create','BattleController@create');
Route::post('battles','BattleController@store');
Route::get('battles/{battles}', 'BattleController@show');
Route::get('battles/{battles}/edit', 'BattleController@edit');
Route::delete('battles/{battles}', 'BattleController@destroy');
Route::patch('battles/{battles}', 'BattleController@update');
//chronicles
Route::get('chronicles', 'ChronicleController@index');
//court
Route::get('courts', 'CourtController@index');
Route::get('courts/create','CourtController@create');
Route::post('courts','CourtController@store');
Route::get('courts/{courts}', 'CourtController@show');
Route::get('courts/{courts}/edit', 'CourtController@edit');
Route::delete('courts/{courts}', 'CourtController@destroy');
Route::patch('courts/{courts}', 'CourtController@update');
//diplomacy
Route::get('diplomacy', 'DiplomacyController@index');
Route::get('diplomacy/create','DiplomacyController@create');
Route::post('diplomacy','DiplomacyController@store');
Route::get('diplomacy/{diplomacy}', 'DiplomacyController@show');
Route::get('diplomacy/{diplomacy}/edit', 'DiplomacyController@edit');
Route::delete('diplomacy/{diplomacy}', 'DiplomacyController@destroy');
Route::patch('diplomacy/{diplomacy}', 'DiplomacyController@update');
//duels
Route::get('duels', 'DuelController@index');
Route::get('duels/create','DuelController@create');
Route::post('duels','DuelController@store');
Route::get('duels/{duels}', 'DuelController@show');
Route::get('duels/{duels}/edit', 'DuelController@edit');
Route::delete('duels/{duels}', 'DuelController@destroy');
Route::patch('duels/{duels}', 'DuelController@update');
//dungeons
Route::get('dungeons', 'DungeonController@index');
Route::get('dungeons/create','DungeonController@create');
Route::post('dungeons','DungeonController@store');
Route::get('dungeons/{dungeons}', 'DungeonController@show');
Route::get('dungeons/{dungeons}/edit', 'DungeonController@edit');
Route::delete('dungeons/{dungeons}', 'DungeonController@destroy');
Route::patch('dungeons/{dungeons}', 'DungeonController@update');
//factions
Route::get('factions', 'FactionController@index');
Route::get('factions/create','FactionController@create');
Route::post('factions','FactionController@store');
Route::get('factions/{factions}', 'FactionController@show');
Route::get('factions/{factions}/edit', 'FactionController@edit');
Route::delete('factions/{factions}', 'FactionController@destroy');
Route::patch('factions/{factions}', 'FactionController@update');
//farms
Route::get('farms', 'FarmController@index');
Route::get('farms/create','FarmController@create');
Route::post('farms','FarmController@store');
Route::get('farms/{farms}', 'FarmController@show');
Route::get('farms/{farms}/edit', 'FarmController@edit');
Route::delete('farms/{farms}', 'FarmController@destroy');
Route::patch('farms/{farms}', 'FarmController@update');
//homes
Route::get('houses', 'HouseController@index');
Route::get('houses/create','HouseController@create');
Route::post('houses','HouseController@store');
Route::get('houses/{houses}', 'HouseController@show');
Route::get('houses/{houses}/edit', 'HouseController@edit');
Route::delete('houses/{houses}', 'HouseController@destroy');
Route::patch('houses/{houses}', 'HouseController@update');
//persons
Route::get('persons', 'PersonController@index');
Route::get('persons/create','PersonController@create');
Route::post('persons','PersonController@store');
Route::get('persons/{person}', 'PersonController@show');
Route::get('persons/{person}/edit', 'PersonController@edit');
Route::delete('persons/{person}', 'PersonController@destroy');
Route::patch('persons/{person}', 'PersonController@update');
//raids
Route::get('raids', 'RaidController@index');
Route::get('raids/create','RaidController@create');
Route::post('raids','RaidController@store');
Route::get('raids/{raids}', 'RaidController@show');
Route::get('raids/{raids}/edit', 'RaidController@edit');
Route::delete('raids/{raids}', 'RaidController@destroy');
Route::patch('raids/{raids}', 'RaidController@update');
//towns
Route::get('towns', 'TownController@index');
Route::get('towns/{towns}', 'TownController@show');
Route::get('towns/{towns}/edit', 'TownController@edit');
Route::patch('towns/{towns}', 'TownController@update');
//town maps
Route::get('mappopulation','TownController@mappopulation');
Route::get('maprebel','TownController@maprebel');
Route::get('mapstaples','TownController@mapstaples');
Route::get('mappeach','TownController@mappeach');
Route::get('mapplum','TownController@mapplum');
Route::get('maptea','TownController@maptea');
Route::get('mapsilk','TownController@mapsilk');
Route::get('mapjade','TownController@mapjade');
Route::get('mapcenser','TownController@mapcenser');
Route::get('mapfabrics','TownController@mapfabrics');
Route::get('mappottery','TownController@mappottery');
Route::get('maplacquerware','TownController@maplacquerware');
Route::get('mappaintings','TownController@mappaintings');
Route::get('mapitems','TownController@mapitems');
//workshops
Route::get('workshops', 'WorkshopController@index');
Route::get('workshops/create','WorkshopController@create');
Route::post('workshops','WorkshopController@store');
Route::get('workshops/{workshops}', 'WorkshopController@show');
Route::get('workshops/{workshops}/edit', 'WorkshopController@edit');
Route::delete('workshops/{workshops}', 'WorkshopController@destroy');
Route::patch('workshops/{workshops}', 'WorkshopController@update');