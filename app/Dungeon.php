<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dungeon extends Model
{
    //dungeons table
    protected $table = 'dungeons';
    protected $primaryKey = 'dungeon_id';
	
	//fk
    public function masters()
    {
        return $this->belongsTo('App\Person','dungeon_master');
    } 
	
    public function towns()
    {
        return $this->belongsTo('App\Town','town');
    } 

	//dungeon key data
	//prisoners
    public function prisoners()
    {
        return $this->hasMany('App\Prisoner','prisoner_id');
    }	
	
}
