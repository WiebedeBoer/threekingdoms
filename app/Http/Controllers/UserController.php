<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\DB;
//models
use App\User;
use App\Person;

class UserController extends Controller
{
    //authenticate
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	//admin index
    public function index()
    {       
        $userdata = User::all();
		$user = auth()->user();
		$user_auth_id = $user->id;
		$admin_check = $user->admin;
		
		if($admin_check ==1)
		{	
			return view('/users', compact('userdata'));		
		}
		else 
		{
			return redirect('/home')->with('message', 'Not allowed'); 
		}	    
    }
	
	//admin destroy
    public function destroy()
    {       
        $userdata = User::all();
		$user = auth()->user();
		$user_auth_id = $user->id;
		$admin_check = $user->admin;
		
		if($admin_check ==1)
		{	
			//delete user
            $del_user = User::findOrFail($id);
            $del_user->delete();
			//return
			return redirect('/users')->with('message', 'Removed User');			
		}
		else 
		{
			return redirect('/home')->with('message', 'Not allowed'); 
		}	    
    }
	
	//show user
    public function show($id)
    {       
        $userdata = User::where('id', $id)->firstOrFail();
		$user = auth()->user();
		$user_auth_id = $user->id;
		if($user_auth_id ==$id)
		{
			$portraitcount = Person::where('owner', $id)->count();
			if($portraitcount ==1){
				$portrait = Person::where('owner', $id)->first();			
				return view('users.show', compact('userdata','portrait','portraitcount'));
			}
			else {
				$portrait = [];
				return view('users.show', compact('userdata','portrait','portraitcount'));			
			}			
		}
		else 
		{
			return redirect('/home')->with('message', 'Not allowed'); 
		}	    
    }
	
	//update user
    public function update(Request $request, $id)
    {       
		$user = auth()->user();
		$user_auth_id = $user->id;
		if($user_auth_id ==$id)
		{
			$data = $request->validate([
				'audio' => 'required|integer'         
			]);        
			$user = new User();					
			$audio_check = request()->input('audio');
			if($audio_check ==0){
				User::where('id',$id)->update($data);
				return redirect('/users/'.$id)->with('message', 'Audio Off');  
			}
			elseif($audio_check ==1){
				User::where('id',$id)->update($data);
				return redirect('/users/'.$id)->with('message', 'Audio On');  
			}
			else {
				return redirect('/home')->with('message', 'Not allowed'); 
			}			
		}
		else 
		{
			return redirect('/home')->with('message', 'Not allowed'); 
		} 
    }	
	
}
