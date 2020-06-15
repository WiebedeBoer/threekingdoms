<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prisoner extends Model
{
    //prisoners table
    protected $table = 'prisoners';
    protected $primaryKey = 'prisoner_id';
	
	//fk
    public function prisoners()
    {
        return $this->belongsTo('App\Person','prisoner');
    } 
	
    public function dungeons()
    {
        return $this->belongsTo('App\Dungeon','dungeon');
    } 
}
