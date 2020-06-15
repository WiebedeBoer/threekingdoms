<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    //workshops table
    protected $table = 'workshops';
    protected $primaryKey = 'workshop_id';
	
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
