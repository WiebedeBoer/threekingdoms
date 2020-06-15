<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //members table
    protected $table = 'members';
    protected $primaryKey = 'member_id';
	
	//fk
    public function persons()
    {
        return $this->belongsTo('App\Person','person');
    } 

    public function factions()
    {
        return $this->belongsTo('App\Faction','faction');
    } 	
	
}
