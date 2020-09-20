<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category_table';
    protected $primaryKey='category_id';
	
	public function products(){
		return $this->belongsToMany('App\Models\Post');
    }
}
