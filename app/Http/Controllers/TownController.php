<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
//models
use App\Person;
use App\Faction;
use App\Town;
use App\User;
use App\Capital;
use App\Home;
use App\Item;
use App\Army;
use App\Farm;
use App\Workshop;
use App\Dungeon;
use App\Chronicle;

class TownController extends Controller
{
    //authenticate
    public function __construct()
    {
        $this->middleware('auth');
    }

	//map view
    public function maprebel()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.maprebel', compact('towns'));	   
    }

	//map view
    public function mappopulation()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.mappopulation', compact('towns'));	   
    }
	
	//map view
    public function mapstaples()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.mapstaples', compact('towns'));	   
    }

	//map view
    public function mapplum()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.mapplum', compact('towns'));	   
    }	
	
	//map view
    public function mappeach()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.mappeach', compact('towns'));	   
    }
	
	//map view
    public function maptea()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.maptea', compact('towns'));	   
    }
	
	//map view
    public function mapsilk()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.mapsilk', compact('towns'));	   
    }	

	//main view
    public function index()
    {            
		$towns = Town::all();	   
        //return view
        return view('towns.index', compact('towns'));	   
    }
	
	//show view
    public function show($id)
    {       
		$towns = Town::where('town_id', $id)->firstOrFail();
		//return
		return view('towns.show', compact('towns'));	
    }
	
	//edit form
    public function edit($id)
    {       
		$towns = Town::where('town_id', $id)->firstOrFail();
		//return
		return view('towns.edit', compact('towns'));
    }
		
    //update function
    public function update(Request $request, $id)
    {
		$towns = Town::where('town_id', $id)->firstOrFail();
		//return
		return view('towns.edit', compact('towns'));
    }
	

	
}
