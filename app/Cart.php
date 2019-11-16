<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
  public static function addCart($itemCode, $customerId, $itemPrice){
    $query = DB::table('cart')->insert([
      'user_code' => $customerId,
      'product_code' => $itemCode,
      'qty' => 1,
      'price' => $itemPrice,
      'status' => 0
    ]);
    return $query;
  }

  public static function getCart($customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->get();
    return $query;
  }

  public static function getCartValid($itemCode, $customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->get();
    return $query;
  }

  public static function incCart($itemCode, $customerId, $qty, $itemPrice, $lastPrice){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->update(['qty' => $qty+1, 'price' => $lastPrice + $itemPrice]);
    return $query;
  }

  public static function decCart($itemCode, $customerId, $qty, $itemPrice, $lastPrice){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->update(['qty' => $qty-1, 'price' => $lastPrice - $itemPrice]);
    return $query;
  }

  public static function deleteCart($itemCode, $customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->delete();
    return $query;
  }

  public static function countCart($customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->count();
    return $query;
  }

  public static function sumCart($customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->sum('price');
    return $query;
  }

}