<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
//models
use App\Person;
use App\User;
use App\Faction;
use App\Town;
use App\Chronicle;

class ChronicleController extends Controller
{
    //authenticate
    public function __construct()
    {
        $this->middleware('auth');
    }	
	
	//main view
    public function index(Request $request)
    { 
		//user id
		$user = auth()->user();
		$user_id = $user->id;		
		
		//return view	
		return view('chronicles.index', compact('chroniclecount','chronicles'));  
	}
}
