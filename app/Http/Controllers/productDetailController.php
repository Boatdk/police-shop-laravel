<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Product;

class productDetailController extends BaseController{
  public function index(Request $req, $product_name){
    $check = $req->session()->get('user');
    return view('pages.product_detail');
  }

}