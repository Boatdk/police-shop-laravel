<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
  public static function addOrder($customerId){
    $query = DB::table('order_list')->insert([
      'user_code' => $customerId,
      'status' => 0,
      'total_price' => 0,
    ]);
    return $query;
  }

  public static function getOrderFromUserId($customerId){
    $query = DB::table('order_list')->where('user_code', $customerId)->get();
    return $query;
  }

}