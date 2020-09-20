<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table='advertisement';
    protected $primaryKey='advertisement_id';
	
	public function products(){
		return $this->belongsToMany('App\Models\Post');
    }
}
