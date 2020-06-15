<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //items table
    protected $table = 'items';
    protected $primaryKey = 'item_id';
	
	//fk
    public function types()
    {
        return $this->belongsTo('App\ItemType','type');
    } 
	
    public function owners()
    {
        return $this->belongsTo('App\Person','owner');
    } 	
	
    public function locations()
    {
        return $this->belongsTo('App\Town','location');
    } 
}
