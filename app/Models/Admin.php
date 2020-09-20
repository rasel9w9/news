<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Admin extends Model
{
    //
	protected $table='user_table';
	protected $primaryKey = 'user_id';
	protected $fillable = ['user_id','user_name','user_image','user_email','user_password','user_mobile','user_role','user_status','created_by','created_date','created_time'];
	
}
