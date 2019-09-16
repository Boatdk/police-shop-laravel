<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  public static function getproductData(){
    $value = DB::table('products')->get();
    return $value;
  }
}