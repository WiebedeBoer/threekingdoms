<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    //stats table
    protected $table = 'stats';
    protected $primaryKey = 'stat_id';
	
	//fk
    public function persons()
    {
        return $this->belongsTo('App\Person','person');
    } 
}
