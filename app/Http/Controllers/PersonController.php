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
use App\Farm;
use App\Home;

class PersonController extends Controller
{
    //authenticate
    public function __construct()
    {
        $this->middleware('auth');
    }	

	//main view
    public function index()
    {            
       return view('persons.index'); 
    }
	
	//show view
    public function show($id)
    {       
        $user = auth()->user();
		$user_audio = $user->audio;
		return view('persons.show', compact('user_audio'));	     
    }
	
	//edit form
    public function edit($id)
    {       
       
    }
	
	//create form
    public function create()
    {       
       
    }
	
    //update function
    public function update(Request $request, $id)
    {

    }
	
    //store function
    public function store()
    {
			
	}
	
    //delete function
    public function destroy($id)
    {
		return view('persons.index');
    }
}
