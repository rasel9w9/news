<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
	public function login(){
		return view('backend.dashboard');
	}
	public function index(){
		return view('admin.login');
	}
}
