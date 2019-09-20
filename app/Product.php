<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  public static function getproductData(){
    $query = DB::table('products')->get();
    return $query;
  }

  public static function getProductFromCode($code){
    $query = DB::table('products')->where('code', $code)->get();
    return $query;
  }

  public static function getproductType($type){
    $query = DB::table('products')->where('type', $type)->get();
    return $query;
  }



}