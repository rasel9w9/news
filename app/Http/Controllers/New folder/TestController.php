<?php

namespace App\Http\Controllers;
use App\TblProduct;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function test(){
		$post = TblProduct::first();
		$post->rate(5);
		dd(TblProduct::first());
	}
}
