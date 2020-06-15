<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    //factions table
    protected $table = 'factions';
    protected $primaryKey = 'faction_id';
	
	//fk
    public function rulers()
    {
        return $this->belongsTo('App\Person','ruler');
    } 	
	
	//world key data
    //members
    public function members()
    {
        return $this->hasMany('App\Member','member_id');
    }	

    //towns
    public function towns()
    {
        return $this->hasMany('App\Town','town_id');
    }	

    //capitals
    public function capitals()
    {
        return $this->hasMany('App\Capital','capital_id');
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
	
	//applicant key data
	//applicants
    public function applicants()
    {
        return $this->hasMany('App\Applicant','applicant_id');
    }
	
}
