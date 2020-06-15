<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    //capitals table
    protected $table = 'capitals';
    protected $primaryKey = 'capital_id';
	
	//fk
    public function strategists()
    {
        return $this->belongsTo('App\Person','strategist');
    } 	
	
    public function factions()
    {
        return $this->belongsTo('App\Faction','faction');
    } 

    public function locations()
    {
        return $this->belongsTo('App\Town','location');
    } 
}
