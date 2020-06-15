<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    //farms table
    protected $table = 'farms';
    protected $primaryKey = 'farm_id';
	
	//fk
    public function owners()
    {
        return $this->belongsTo('App\Person','owner');
    } 
	
    public function locations()
    {
        return $this->belongsTo('App\Town','location');
    } 
}
