<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Category;
use DB;

class PostController extends Controller
{
	public function __construct(){
		//$this->middleware('login_check');
	}
    public function index(){
		return view('admin/post/add_post');
	}
	
	public function all_posts(){
		$allPosts=DB::table('post_table')
				->join('reporter_table','post_table.reporter','reporter_table.reporter_id')
				->join('category_table','post_table.post_category_id','category_table.category_id')
				->get();
		
		return view('admin.post.all_posts')->with('allPosts',$allPosts);
	}
	
	public function save_post(Request $request){
		$request->validate([
			'post_title'=>['bail','required','string'],
			'post_category_id'=>['required']
		]);
		$data=$request->all();
		$data['post_category_id']=implode(',',$request->get('post_category_id'));
		$data['posted_by'] = 'Developer Alauddin';
        $data['updated_by'] = 0;
        $data['post_date'] = date("Y-m-d");
        $data['post_time'] = date("H:i:s");
		$data['news_views'] = 0;
		if($postImage=$request->file('post_image')){
			$request->validate([
				'post_image'=>['required',"mimes:['jpg,jpeg,png']"]
			]);
			$path="uploads/media_image/".date('Y').'/'.date('m').'/';
			$data['post_image']=$postImage->store($path);
		}else{
			$data['post_image']='uploads/no_image.jpg';
		}
		$post=new Post;
		if($post->fill($data)->save()){
			$categories=category::find($request->get('post_category_id'));
			$post->category()->attach($categories);
			session()->flash('post_msg',"News Posted Succesfully..");
			session()->flash('class',"alert alert-success");
			return redirect()->back();
		} else{
			session()->flash('post_msg',"News Not Posted!!!");
			session()->flash('class',"alert alert-danger");
			return redirect()->back()->withInput();
		}
	}
	
	public function publication($id,$status){
		$post=Post::find($id);
		$data['post_status']=$status;
		if($post->update($data)){
			if($status==1){
				session()->flash('post_msg',"News Activated Succesfully..");
				session()->flash('class',"alert alert-success");
			}else{
				session()->flash('post_msg',"News Deactivated Succesfully..");
				session()->flash('class',"alert alert-success");
			}
		}else{
			session()->flash('post_msg',"Sorry!Operation failed,try Again later");
			session()->flash('class',"alert alert-danger");
		}
		return redirect()->back();
	}
	
	public function delete_post($id){
		$post=Post::find($id);
		$imagelink=$post->post_image;
		if($post->delete()){
			if($imagelink!='uploads/no_image.jpg'){
				unlink('storage/app/'.$imagelink);
			}
			$post->category()->detach();
			session()->flash('post_msg',"News Deleted Succesfully..");
			session()->flash('class',"alert alert-success");
			return redirect()->back();
		}else{
			session()->flash('post_msg',"News Delete failed");
			session()->flash('class',"alert alert-danger");
			return redirect()->back();
		}
	}
	public function edit_post($id){
		//$post=DB::table('tbl_posts')->where('post_id',$id)->first();
		$post=Post::find($id);
		//dd($post->post_id);
		if($post){
		return view('admin.post.edit_post',compact('post'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_post(Request $request,$id){
		$request->validate([
			'post_title'=>['bail','required','string'],
			'post_category_id'=>['required']
		]);
		$data=$request->all();
		$data['post_category_id']=implode(',',$request->get('post_category_id'));
        $data['updated_by'] = "Alauddin";
		if($postImage=$request->file('post_image')){
			$request->validate([
				'post_image'=>['required',"mimes:['jpg,jpeg,png']"]
			]);
			$path="uploads/media_image/".date('Y').'/'.date('m').'/';
			$data['post_image']=$postImage->store($path);
			if($request->oldimage!='uploads/no_image.jpg'){
				unlink("storage/app/".$request->oldimage);
			}
		}
		$post=Post::find($id);
		if($post->update($data)){
			$categories=category::find($request->get('post_category_id'));
			$post->category()->sync($categories);
			session()->flash('post_msg',"News Updated Succesfully..");
			session()->flash('class',"alert alert-success");
			return redirect()->back();
		} else{
			session()->flash('post_msg',"News Not Updated!!!");
			session()->flash('class',"alert alert-danger");
			return redirect()->back()->withInput();
		}
	}
	
}
