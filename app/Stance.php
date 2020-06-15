<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stance extends Model
{
    //stances table
    protected $table = 'stances';
    protected $primaryKey = 'stance_id';
	
	//fk
    public function toes()
    {
        return $this->belongsTo('App\Faction','to');
    } 
	
    public function froms()
    {
        return $this->belongsTo('App\Faction','from');
    } 
}
