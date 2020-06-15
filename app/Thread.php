<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //threads tabel
    protected $table = 'threads';
    protected $primaryKey = 'thread_id';
	
    public function creators()
    {
        return $this->belongsTo('App\User','creator');
    } 

    public function taverns()
    {
        return $this->belongsTo('App\Town','tavern');
    } 	
	
    public function factions()
    {
        return $this->belongsTo('App\Faction','faction');
    } 
	
    public function belligerents()
    {
        return $this->belongsTo('App\Faction','belligerent');
    } 

	//forum key data
	//posts
	public function posts()
    {
        return $this->hasMany('App\Post','post_id');
    }	
}
