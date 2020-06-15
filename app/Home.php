<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //homes table
    protected $table = 'homes';
    protected $primaryKey = 'home_id';
	
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
