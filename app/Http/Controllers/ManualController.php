<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManualController extends Controller
{
	//manual main
    public function index()
    {       
        return view('manual.index');        
    }
	
    public function character()
    {       
        return view('manual.character');        
    }
	
    public function economy()
    {       
        return view('manual.economics');        
    }
	
    public function gameworld()
    {       
        return view('manual.gameworld');        
    }
	
    public function roles()
    {       
        return view('manual.roles');        
    }
	
    public function units()
    {       
        return view('manual.military');        
    }	
	
    public function warfare()
    {       
        return view('manual.warfare');        
    }
	
}
