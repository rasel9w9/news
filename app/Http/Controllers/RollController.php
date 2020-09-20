<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Roll;
class RollController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		//$this->middleware('logincheck');
	}
    public function index(){
		$allRolls=Roll::all();
		$allTypes=DB::table('user_type')->get();
		return view('admin.roll.roll',compact('allRolls','allTypes'));
	}
	public function save_roll(Request $request){
		$doesntExist=DB::table('user_type')->where('type',$request->type)->doesntExist();
		if($doesntExist){
			$data=array();
			$data['type']=$request->type;
			$columnName=strtolower(str_replace(' ','_',$request->type)."_roll");
			$data['rolls']=implode(',',$request->selectedRull);
			$insert=DB::table('user_type')->insert($data);
			$addColumnQuery="ALTER TABLE roll_settings ADD $columnName varchar(250) NULL";
			DB::statement($addColumnQuery);
			$insert ? $msg='success' : $msg='fail' ;
			echo $msg;
		}
	}

	public function update_roll(Request $request){
		$types=DB::table('user_type')->get();
		$types=$types->skip(1);
		$formdata=array_values($request->except('_token'));
		foreach($types as $key=>$value){
			$formindex=($key-1);
			$data=implode(',',$formdata[$formindex]);
			$update=DB::table('user_type')->where('id',$value->id)->update(['rolls'=>$data]);
		}
		$formdata2=$request->except('_token');
		DB::table('roll_settings')->update($formdata2);
		if($update){
			session()->flash('class',"alert alert-success");
			session()->flash('roll_msg',"Roll Updated Succesfully..");
		}else{
			session()->flash('class',"alert alert-danger");
			session()->flash('roll_msg',"Sorry!Roll Not Updated");
		}
		return redirect()->back();
	}
}
