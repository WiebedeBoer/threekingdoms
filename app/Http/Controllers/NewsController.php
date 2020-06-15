<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
	//news list
    public function index()
    {       
        return view('news.index');        
    }
	//rules
    public function rules()
    {       
        return view('news.rules');        
    }	
	//terms and conditions
    public function terms()
    {       
        return view('news.terms');        
    }
	//privacy
	public function privacy()
    {       
        return view('news.privacy');        
    }
}
