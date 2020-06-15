<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    //armies table
    protected $table = 'armies';
    protected $primaryKey = 'army_id';
	
	//fk
    public function marshalls()
    {
        return $this->belongsTo('App\Person','marshall');
    } 
	
    public function generals()
    {
        return $this->belongsTo('App\Person','general');
    } 
	
    public function lieutenants()
    {
        return $this->belongsTo('App\Person','lieutenant');
    } 

    public function logistics()
    {
        return $this->belongsTo('App\Town','logistics');
    } 
	
    public function locations()
    {
        return $this->belongsTo('App\Town','location');
    } 
}
