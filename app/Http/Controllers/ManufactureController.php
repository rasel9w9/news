<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class ManufactureController extends Controller
{
	public function __construct(){
		$this->middleware('login_check');
	}
    public function index(){
		return view('admin/manufacture/add_manufacture');
	}
	
	public function all_manufactures(){
		$manufactures=DB::table('tbl_manufacture')->get();
		return view('admin.manufacture.all_manufactures')->with('allmanufactures',$manufactures);
	}
	
	public function save_manufacture(Request $request){
		$validate=$request->validate([
			'manufacture_name'=>['required','string'],
			'manufacture_status'=>['boolean']
		]);
		//This if condition for solving cannot be null 'publication_status' column solution...
		if($request->publication_status!=1){
			$request->publication_status=0;
		}
		$data=[
			'manufacture_name'=>$request->manufacture_name,
			'publication_status'=>$request->publication_status
		];
		$insert=DB::table('tbl_manufacture')->insert($data);
		if($insert){
			session()->flash('cat_msg',"Manufacture Added Succesfully..");
			return redirect()->back();
		}
	}
	
	public function publication($id,$status){
		$update=DB::table('tbl_manufacture')->where('manufacture_id',$id)
				->update([
					'publication_status'=>$status
				]);
		if($update){
			if($status==1){
				session()->flash('publication_msg',"Manufacture Activate Succesfully..");
			}else{
				session()->flash('publication_msg',"Manufacture Inactive Succesfully..");
			}
		}else{session()->flash('publication_msg',"Sorry!Manufacture Operation Failed");}
			//print_r($update);
		return redirect()->back();
	}
	
	public function delete_manufacture($id){
		$delete=DB::table('tbl_manufacture')->where('manufacture_id',$id)
				->delete();
		return redirect()->back();
	}
	public function edit_manufacture($id){
		$manufacture=DB::table('tbl_manufacture')->where('manufacture_id',$id)->first();
		if($manufacture){
		return view('admin.manufacture.edit_manufacture',compact('manufacture'));
		}else{echo "There is an error.Please try again";}
	}
	
	public function update_manufacture(Request $request,$id){
		$validate=$request->validate([
			'manufacture_name'=>['string','required']
		]);
		$data=[
			'manufacture_name'=>$request->manufacture_name
		];
		$update=DB::table('tbl_manufacture')->where('manufacture_id',$id)->update($data);
		if($update){
			session()->flash('edit_manu_msg',"Manufacture Updated Succesfully..");
			return redirect('/all_manufactures');
		}else{echo "<h4>There is an error to update!</h4>";}
	}
}
