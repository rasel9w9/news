<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    //
	protected $table='post_table';
	protected $primaryKey = 'post_id';
	protected $fillable = ['post_title','post_sub_title','post_category_id','post_image','image_caption','post_description','video_id','scroll','lead_news','top_news','category_pin','reporter','related_news_id','post_time','post_date','post_status','seo_keyword','seo_description','posted_by','updated_by','updated_time','updated_date','news_views','video_id'];
	public function reporter(){
		return $this->hasOne('App\Models\Reporter','reporter_id','reporter');
	}
	public function category(){
		return $this->belongsToMany('App\Models\Category');
	}
}
