<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Reporter extends Model
{
    //
	protected $table = 'reporter_table';
	protected $primaryKey = 'reporter_id';
	protected $fillable=['reporter_id','reporter_name','reporter_email','reporter_image','reporter_mobile','reporter_address','reporter_status','created_by','created_date','created_time'];
}
