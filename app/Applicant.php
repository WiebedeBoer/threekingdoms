<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //applicants table
    protected $table = 'applicants';
    protected $primaryKey = 'applicant_id';
	
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
