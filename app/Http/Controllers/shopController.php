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
    $url = url()->full();
    $type = substr($url, 27);
    if($type === 'shirt'){
      $filter = 1;
      $msg = 'เสื้อ เสื้อเกราะ';
    }elseif($type === 'pants'){
      $filter = 2;
      $msg = 'กางเกง';
    }elseif($type === 'shoes'){
      $filter = 3;
      $msg = 'รองเท้า';
    }elseif($type === 'accessories'){
      $filter = 4;
      $msg = 'กระเป๋า';
    }else{
      $filter = 0;
      $msg = 'สินค้าทั้งหมด';
    }
    // print_r($filter);
    // print_r($url);exit;
    if($filter == 0){
      $product = Product::getproductData();
      $count = Product::getproductData()->count();
    }elseif($filter == 1){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }elseif($filter == 2){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }elseif($filter == 3){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }elseif($filter == 4){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }
    
    // print_r($product[0]->name);exit;
    return view('pages.shop')->with('product', $product)->with('type', $msg)->with('count', $count);
  }

}