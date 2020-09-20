<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use DB;

class MediaController extends Controller
{
	public function __construct(){
		//$this->middleware('login_check');
	}
    public function index(){
		$allMedias=Media::all();
		return view('admin/media/media',compact('allMedias'));
	}
}
