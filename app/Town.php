<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    //towns table
    protected $table = 'towns';
    protected $primaryKey = 'town_id';
	
	//fk
    public function rulers()
    {
        return $this->belongsTo('App\Person','ruler');
    } 
	
    public function governors()
    {
        return $this->belongsTo('App\Person','governor');
    } 

    public function factions()
    {
        return $this->belongsTo('App\Faction','faction');
    } 	
	
	//world key data
    //capitals
    public function towns()
    {
        return $this->hasMany('App\Capital','capital_id');
    }	
	
    //homes
    public function homes()
    {
        return $this->hasMany('App\Home','home_id');
    }	
	
    //items
    public function items()
    {
        return $this->hasMany('App\Item','item_id');
    }	

    //armies
    public function logistics()
    {
        return $this->hasMany('App\Army','army_id');
    }	
	
    public function battles()
    {
        return $this->hasMany('App\Army','army_id');
    }

	//farms
    public function farms()
    {
        return $this->hasMany('App\Farm','farm_id');
    }
	
	//workshops
    public function workshops()
    {
        return $this->hasMany('App\Workshop','workshop_id');
    }

	//forum key data
	//threads
    public function threads()
    {
        return $this->hasMany('App\Thread','thread_id');
    }	
	
	//chronicles
    public function chronicles()
    {
        return $this->hasMany('App\Chronicle','chronicle_id');
    }
	
	//dungeon key data
	//dungeons
    public function masters()
    {
        return $this->hasMany('App\Dungeon','dungeon_id');
    }	
	
}
