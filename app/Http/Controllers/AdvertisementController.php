<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Advertisement;
class AdvertisementController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		//$this->middleware('logincheck');
	}
    public function index(){
		$allAdvertisements=Advertisement::all();
		$adlocations=DB::table('ad_location')->get();
		//return $allAdvertisements;
		return view('admin.advertisement.add_advertisement',compact('allAdvertisements','adlocations'));
	}

	public function all_advertisements(){
		$advertisements=DB::table('advertisement_table')->get();
		return view('admin.advertisement.all_advertisements')->with('advertisements',$advertisements);
		//return $categories;
		//return view('admin.all_advertisement',compact('categories'));
	}

	public function save_advertisement(Request $request){
		$date=date('d-M-Y');
		$validate=$request->validate([
			'advertisement_name'=>['string','required'],
			'advertisement_status'=>['boolean'],
			'advertisement_url'=>['string','required','url'],
			'advertisement_location'=>['string','required'],
			'advertisement_image'=>['required',"image"],
			'end_at'=>['required','date',"after:$date"]
		]);
		//This if condition for solving cannot be null 'publication_status' column solution...
		$data=[
			'advertisement_name'=>$request->advertisement_name,
			'advertisement_location'=>$request->advertisement_location,
			'advertisement_url'=>$request->advertisement_url,
			'advertisement_status'=>$request->advertisement_status,
			'created_by'=>session('admin_name'),
			'created_at'=>now(),
			'end_at'=>date('Y-m-d',strtotime($request->end_at)),
		];
		if($adImage=$request->file('advertisement_image')){
			//$path="uploads/ad_image/".date('Y').'/'.date('m').'/';
			$path="uploads/ad_image/";
			$data['advertisement_image']=$adImage->store($path);
		}
		if(!$data['advertisement_status']){
			$data['advertisement_status']=0;
		}
		//return $data;
		//$input=$request->all();
		$insert=DB::table('advertisement')->insert($data);
		if($insert){
			session()->flash('class',"alert alert-success");
			session()->flash('adv_msg',"Advertisement Added Succesfully..");
			return redirect()->back();
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('adv_msg',"Sorry! Advertisement Not Added..");
			//return redirect()->back()->withInput();
			return redirect()->back();
		}
	}

	public function publication($id,$status){
		$update=DB::table('advertisement')->where('advertisement_id',$id)
				->update([
					'advertisement_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('class',"alert alert-success");
				session()->flash('cat_msg',"Advertisement Activate Succesfully..");
			}else{
				session()->flash('class',"alert alert-success");
				session()->flash('cat_msg',"Advertisement Inactive Succesfully..");
			}
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('publication_msg',"Sorry!Advertisement Operation Failed");
		}
		//print_r($update);
		return redirect()->back();
	}

	public function delete_advertisement($id){
		$delete=DB::table('advertisement_table')->where('advertisement_id',$id)
				->delete();
		if($delete){
			session()->flash('class',"alert alert-success");
			session()->flash('cat_msg',"Advertisement Deleted Succesfully..");
		}else{
			session()->flash('class',"alert alert-warning");
			session()->flash('cat_msg',"Sorry!Advertisement Not deleted.");
		}
		return redirect()->back();
	}
	public function edit_advertisement($id){
		$advertisement=DB::table('advertisement')->where('advertisement_id',$id)->first();
		if($advertisement){
		return view('admin.advertisement.edit_advertisement',compact('advertisement'));
		}else{echo "There is an error.Please try again";}
	}

	public function update_advertisement(Request $request,$id){
		$validate=$request->validate([
			'advertisement_name'=>['string','required'],
			'advertisement_status'=>['boolean']
		]);
		$data=[
			'advertisement_name'=>$request->advertisement_name,
			'advertisement_type'=>$request->advertisement_type,
			'advertisement_description'=>$request->advertisement_description,
			'advertisement_status'=>$request->advertisement_status
		];
		if(!$data['advertisement_status']){
			$data['advertisement_status']=0;
		}
		$update=DB::table('advertisement_table')->where('advertisement_id',$id)->update($data);
		if($update){
			session()->flash('class',"alert alert-success");
			session()->flash('cat_msg',"Advertisement Updated Succesfully..");
			return redirect()->route('advertisement');
		}else{echo "<h4>There is an error to update!</h4>";}
	}
}
