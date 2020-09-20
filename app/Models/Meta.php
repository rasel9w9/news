<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Meta extends Model
{
    //
	protected $table='meta_table';
	protected $primaryKey = 'meta_id';
	protected $fillable = ['meta_id','site_name','site_title','site_keywords','site_email','site_number','site_logo','site_icon','site_description','facebook','twitter','linkedin','google','youtube','site_address_1','site_address_2','site_address_3','site_address_4','map_latitude','map_longitude','google_play','apple_store','pinterest'];
}
