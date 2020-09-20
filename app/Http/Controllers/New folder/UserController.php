<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
	
	public function api(){
		echo "Api Routes Here";
	}
}
