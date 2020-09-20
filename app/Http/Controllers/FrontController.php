<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
use Illuminate\Support\Facades\Hash;
use App\models\Category;
use DB;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	//$this->code_image();
    //$gs = Generalsetting::findOrFail(1);
	//$password= Hash::make('1234561');
	//dd($password);
		 if(!empty($request->reff))
		 {
			$affilate_user = User::where('affilate_code','=',$request->reff)->first();
			if(!empty($affilate_user))
			{
				if($gs->is_affilate == 1)
				{
					Session::put('affilate', $affilate_user->id);
					return redirect()->route('front.index');
				}

			}
		 }
		 
		//dd($this->db);
		$meta=DB::table('meta_table')->where('meta_id',1)->first();
		//dd($meta);
		$categories=DB::table('category_table')
					->where('category_type',1)
					->where('category_status',1)
					->orderBy('menu_order','asc')
					->get();
		//$allpost=Post::all();
		//dd($allpost);
		$allPost=DB::table('post_table')
				->where('post_status',1)
				->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
				//->join('tbl_manufacture','tbl_products.manufac_id','tbl_manufacture.manufacture_id')
				->orderBy('post_id','desc')
				->get();
		/* $filter=$allPost->filter(function($post){
				if(strpos($post->post_category_id,'3')>-1){
					return $post;
				} 
			});
		*/
		//dd($filter);
		//dd($allPost[0]->post_category_id);
		$scroll_newses=$allPost->where('scroll',1);
		$lead_news=$allPost->where('lead_news',1)->first();
		$top_newses=$allPost->where('top_news',1);
		//dd($top_newses);
		$latest_news=$allPost->take(3);
		$most_viewed=$allPost->sortByDesc('news_views');
		$home_video_pin=DB::table('video_table')->where('video_status',1)
											->where('video_pin', 1)
											->orderBy('video_id', 'desc')
											->take(1)->get();
		$home_gallery=DB::table('image_table')->where('image_status',1)
											->orderBy('image_id', 'desc')
											->limit(1)->get();
		$ad=DB::table('advertisement')->where('advertisement_status',1)
									  ->orderBy('advertisement_id','DESC')
									  ->get();
		//return $ad;
		return view('frontend.index',compact('allPost','meta','categories','latest_news','scroll_newses','lead_news','top_newses','most_viewed','home_video_pin','home_gallery','ad'));
	}
	
	public function news_view_by_id($id){
		$meta=DB::table('meta_table')->where('meta_id',1)->first();
		$categories=DB::table('category_table')
					->where('category_type',1)
					->where('category_status',1)
					->orderBy('menu_order','asc')
					->get();
		$ad=DB::table('advertisement')
			->where('advertisement_status',1)
			->orderBy('advertisement_id','DESC')
			->get();
		$scroll_newses=DB::table('post_table')
					   ->where('post_status',1)
					   ->where('scroll',1)
					   ->orderBy('post_id', 'desc')
					   ->get();
		$news_view=DB::table('post_table')
				   ->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
				   ->where('post_id',$id)
				   ->first();
		$related_cat=$news_view->post_category_id[0];
		//dd($news_view->post_category_id[0]);
		$ad=DB::table('advertisement')
				->where('advertisement_status',1)
				->whereIn('advertisement_location',[19,20,21,22,23,24])
				->orderBy('advertisement_id','DESC')
				->get();
		$related_newses=DB::table('post_table')
					   ->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
					   ->where('post_status',1)
					   ->where('post_category_id', 'like', "%$related_cat%")
					   ->where('post_id','<>',$id)
					   ->orderBy('post_id', 'desc')
					   ->get();
		$sidebar_newses=DB::table('post_table')
						->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
						->where('post_status',1)
						->orderBy('post_id', 'desc')
						->limit(2)
						->get();
		$latest_newses=DB::table('post_table')
					->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
					->where('post_status',1)
					->orderBy('post_id', 'desc')
					->limit(20)
					->get();		
		//dd($sidebar_newses);
		return view('frontend.single',compact('meta','categories','ad','scroll_newses','related_newses','sidebar_newses','latest_newses','news_view','ad'));
		
	}
	
	public function news_by_category($cat_id){
		$id=$cat_id;
		$meta=DB::table('meta_table')->where('meta_id',1)->first();
		$allNewsByCategory=DB::table('post_table')
				->where('post_status',1)
				->where('post_category_id', 'like', "%$cat_id%")
				->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
				->paginate(3);
		$categories=DB::table('category_table')
					->where('category_type',1)
					->where('category_status',1)
					->orderBy('menu_order','asc')
					->get();
		$ad=DB::table('advertisement')
			->where('advertisement_status',1)
			->orderBy('advertisement_id','DESC')
			->get();
		$scroll_newses=DB::table('post_table')
					   ->where('post_status',1)
					   ->where('scroll',1)
					   ->orderBy('post_id', 'desc')
					   ->get();
		$news_view=DB::table('post_table')
				   ->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
				   ->where('post_id',$id)
				   ->first();
		//dd($news_view);
		$related_cat=$news_view->post_category_id[0];
		//dd($news_view->post_category_id[0]);
		$ad=DB::table('advertisement')
				->where('advertisement_status',1)
				->whereIn('advertisement_location',[19,20,21,22,23,24])
				->orderBy('advertisement_id','DESC')
				->get();
		$related_newses=DB::table('post_table')
					   ->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
					   ->where('post_status',1)
					   ->where('post_category_id', 'like', "%$related_cat%")
					   ->where('post_id','<>',$id)
					   ->orderBy('post_id', 'desc')
					   ->get();
		$sidebar_newses=DB::table('post_table')
						->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
						->where('post_status',1)
						->orderBy('post_id', 'desc')
						->limit(2)
						->get();
		$latest_newses=DB::table('post_table')
					->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
					->where('post_status',1)
					->orderBy('post_id', 'desc')
					->limit(20)
					->get();		
		//dd($sidebar_newses);
		return view('frontend.category',compact('meta','categories','ad','scroll_newses','allNewsByCategory','sidebar_newses','latest_newses','news_view','ad'));
		
	}
	public function news_by_search($keyword){
		$id=$cat_id;
		$meta=DB::table('meta_table')->where('meta_id',1)->first();
		$allNewsBySearch=DB::table('post_table')
				->where('post_status',1)
				->where('post_title', 'like', "%$keyword%")
				->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
				->paginate(10);
		$categories=DB::table('category_table')
					->where('category_type',1)
					->where('category_status',1)
					->orderBy('menu_order','asc')
					->get();
		$ad=DB::table('advertisement')
			->where('advertisement_status',1)
			->orderBy('advertisement_id','DESC')
			->get();
		$scroll_newses=DB::table('post_table')
					   ->where('post_status',1)
					   ->where('scroll',1)
					   ->orderBy('post_id', 'desc')
					   ->get();
		$news_view=DB::table('post_table')
				   ->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
				   ->where('post_id',$id)
				   ->first();
		$related_cat=$news_view->post_category_id[0];
		//dd($news_view->post_category_id[0]);
		$ad=DB::table('advertisement')
				->where('advertisement_status',1)
				->whereIn('advertisement_location',[19,20,21,22,23,24])
				->orderBy('advertisement_id','DESC')
				->get();
		$related_newses=DB::table('post_table')
					   ->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
					   ->where('post_status',1)
					   ->where('post_category_id', 'like', "%$related_cat%")
					   ->where('post_id','<>',$id)
					   ->orderBy('post_id', 'desc')
					   ->get();
		$sidebar_newses=DB::table('post_table')
						->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
						->where('post_status',1)
						->orderBy('post_id', 'desc')
						->limit(2)
						->get();
		$latest_newses=DB::table('post_table')
					->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
					->where('post_status',1)
					->orderBy('post_id', 'desc')
					->limit(20)
					->get();		
		//dd($sidebar_newses);
		return view('frontend.category',compact('meta','categories','ad','scroll_newses','allNewsByCategory','sidebar_newses','latest_newses','news_view','ad'));
		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
