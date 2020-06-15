<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //people table
    protected $table = 'people';
    protected $primaryKey = 'person_id';
	
	//fk
    public function controllers()
    {
        return $this->belongsTo('App\User','owner');
    } 

	//world key data
    //factions
    public function factions()
    {
        return $this->hasMany('App\Faction','faction_id');
    }	
	
    //rulers
    public function rulers()
    {
        return $this->hasMany('App\Town','town_id');
    }	
	
    //governors
    public function governors()
    {
        return $this->hasMany('App\Town','town_id');
    }

	//person key data
    //skills
    public function skills()
    {
        return $this->hasMany('App\Skill','skill_id');
    }	
	
    //stats
    public function stats()
    {
        return $this->hasMany('App\Stat','stat_id');
    }	
	
	//coupling key data
    //strategists
    public function strategist()
    {
        return $this->hasMany('App\Capital','capital_id');
    }		
	
    //members
    public function members()
    {
        return $this->hasMany('App\Member','member_id');
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
    public function marshalls()
    {
        return $this->hasMany('App\Army','army_id');
    }
	
    public function generals()
    {
        return $this->hasMany('App\Army','army_id');
    }
	
    public function lieutenants()
    {
        return $this->hasMany('App\Army','army_id');
    }
	
}
