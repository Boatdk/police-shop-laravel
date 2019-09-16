<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class productController extends BaseController
{
    public function index(){
      return view('pages.product');
    }

    public function addProduct(Request $req){
      $name = $req->input('product_name');
      $type = $req->input('product_type');
      $color = $req->input('product_color');
      $brand = $req->input('product_brand');
      $size = $req->input('product_size');
      $volume = $req->input('product_volume');
      $price = $req->input('product_price');
      $image = $req->input('product_image');
      $code = $req->input('product_code');
      $addProduct = DB::table('products')->insert([
        'code' => $code,
        'name' => $name,
        'type' => $type,
        'color' => $color,
        'brand' => $brand,
        'size' => $size,
        'volume' => $volume,
        'price' => $price,
        'image' => $image,
        'code' => $code
      ]);
      if($addProduct == 1){
        return redirect()->action('homeController@index');
      }else{
        return '<script>alert("FAIL");</script>';
      }
    }


}
