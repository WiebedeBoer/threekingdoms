<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    //relations table
    protected $table = 'relations';
    protected $primaryKey = 'relation_id';
	
	//fk
    public function toes()
    {
        return $this->belongsTo('App\Person','to');
    } 
	
    public function froms()
    {
        return $this->belongsTo('App\Person','from');
    } 
}
