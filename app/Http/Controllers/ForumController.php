<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    //authenticate
    public function __construct()
    {
        $this->middleware('auth');
    }	

	//main view
    public function index()
    {            
		return view('forum.index');
    }
	
	//show view
    public function show($id)
    {       
        $postdata = Post::where('post', $post)->get(); 
		return view('forum.show', compact('postdata'));     
    }
	
	//edit form
    public function edit($id)
    {       
        $postdata = Post::where('post', $post)->get(); 
		return view('forum.edit', compact('postdata'));        
    }
	
	//create form
    public function create()
    {       
		return view('forum.create'); 
    }
	
    //update function
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'message' => 'required|min:2'      
        ]);
        Post::where('post_id',$post_id)->update($data);
        return redirect('/forum')->with('message', 'Edited');
    }
	
    //store function
    public function store()
    {
        $data = request()->validate([            
            'thread_name' => 'required|min:2'
        ]);          
        $thread = new Thread();  
        $thread->framework_name = request('thread_name');
        $thread->save();       
        //return
        return redirect('/forum')->with('message', 'Created');  		
	}
	
    //delete function
    public function destroy($id)
    {

    }
	
	//threads
	//show posts in thread view
    public function thread($thread)
    {       
 		$threadcount = Thread::where('thread_id', $thread)->count(); 
		if ($threadcount >=1)
		{
			$threaddata = Thread::where('thread_id', $thread)->get(); 
		}
		else {
			$threaddata =[];
		}
 		$postcount = Post::where('thread', $thread)->count(); 
		if ($postcount >=1)
		{
			$postdata = Post::where('thread', $thread)->get(); 
		}
		else {
			$postdata =[];
		}		
		
		$userid = Auth::user()->id;
		
		return view('forum.thread', compact('threaddata','threadcount','postdata','postcount','userid'));        
    }	
	
	//subfora
	//open view
	public function open()
	{
		$sub ="quest";
		$threadcount = Thread::where('subforum', $sub)->count();
		if ($threadcount >=1)
		{
			$threaddata = Thread::where('subforum', $sub)->get();
		}
		else {
			$threaddata =[];
		}		
		return view('forum.open', compact('threadcount','threaddata'));  
	}
	
	//tavern view
	public function tavern()
	{
		$sub ="tavern";
		$threadcount = Thread::where('subforum', $sub)->count();
		if ($threadcount >=1)
		{
			$threaddata = Thread::where('subforum', $sub)->get();
		}
		else {
			$threaddata =[];
		}
		return view('forum.tavern', compact('threadcount','threaddata'));  
	}

	//intro view
	public function intro()
	{
		$sub ="intro";
		$threadcount = Thread::where('subforum', $sub)->count();
		if ($threadcount >=1)
		{
			$threaddata = Thread::where('subforum', $sub)->get();
		}
		else {
			$threaddata =[];
		}
		return view('forum.intro', compact('threadcount','threaddata'));  
	}
	
	//kingdom view
	public function kingdom()
	{
		$sub ="kingdom";
		$threadcount = Thread::where('subforum', $sub)->count();
		if ($threadcount >=1)
		{
			$threaddata = Thread::where('subforum', $sub)->get();
		}
		else {
			$threaddata =[];
		}
		return view('forum.kingdom', compact('threadcount','threaddata'));  
	}
	
	//region view
	public function region()
	{
		$sub ="region";
		$threadcount = Thread::where('subforum', $sub)->count();
		if ($threadcount >=1)
		{
			$threaddata = Thread::where('subforum', $sub)->get();
		}
		else {
			$threaddata =[];
		}
		return view('forum.region', compact('threadcount','threaddata'));  
	}
	
	//war view
	public function war()
	{
		$sub ="war";
		$threadcount = Thread::where('subforum', $sub)->count();
		if ($threadcount >=1)
		{
			$threaddata = Thread::where('subforum', $sub)->get();
		}
		else {
			$threaddata =[];
		}
		return view('forum.war', compact('threadcount','threaddata'));  
	}		
	
	
}
