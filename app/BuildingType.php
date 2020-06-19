<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model
{
    //buildings table
    protected $table = 'buildings_types';
    protected $primaryKey = 'building_type_id';
	
	//buildings
    public function buildings()
    {
        return $this->hasMany('App\Building','building_id');
    }
}
