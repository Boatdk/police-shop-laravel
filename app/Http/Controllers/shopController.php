<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Product;

class shopController extends BaseController{
  public function index(Request $req){
    $check = $req->session()->get('user');
    $product = Product::getproductData();
    // print_r($product[0]->name);exit;
    return view('pages.shop')->with('product', $product);
  }

}