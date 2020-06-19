<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //buildings table
    protected $table = 'buildings';
    protected $primaryKey = 'building_id';
	
	//fk
    public function categories()
    {
        return $this->belongsTo('App\BuildingType','type');
    } 

    public function towns()
    {
        return $this->belongsTo('App\Town','town');
    } 	
	
}
