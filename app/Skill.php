<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //skills table
    protected $table = 'skills';
    protected $primaryKey = 'skill_id';
	
	//fk
    public function persons()
    {
        return $this->belongsTo('App\Person','person');
    } 
}
