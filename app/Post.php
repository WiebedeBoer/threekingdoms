<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //posts tabel
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
	
    public function creators()
    {
        return $this->belongsTo('App\User','creator');
    } 

    public function threads()
    {
        return $this->belongsTo('App\Thread','thread');
    } 
}
