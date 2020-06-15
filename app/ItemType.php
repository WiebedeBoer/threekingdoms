<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    //item types table
    protected $table = 'item_types';
    protected $primaryKey = 'item_type_id';
	
	//world key data
    //items
    public function items()
    {
        return $this->hasMany('App\Item','item_id');
    }
}
