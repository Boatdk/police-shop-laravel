<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Order;
use App\Product;

class statController extends BaseController{
  public function index(Request $req){
    $today = "%".date("Y-m-d")."%";
    $sale = Order::calOrder($today);
    $orderByDay = Order::getOrderByDay($today);
    $countSuccess = Order::countOrder(2, $today);
    $countHolding = Order::countOrder(1, $today);
    $countCancel = Order::countOrder(3, $today);
    $bestSeller = $this->bestSeller();
    $product = array();
    foreach($bestSeller as $key => $value){
      $getProduct = Product::getProductFromCode($value->product_code);
      $data = array(
        "name" => $getProduct[0]->name,
        "image_url" => $getProduct[0]->image
      );
      $addProduct = array_push($product, $data);
    }
    $count = array(
      "success" => $countSuccess,
      "hold" => $countHolding,
      "cancel" => $countCancel
    );
    return view('pages.stat')->with('count', $count)->with('bestProduct', $product)->with('sales', $sale)->with('order', $orderByDay);
  }

  public function bestSeller(){
    $bestSeller = Cart::bestSeller();
    return $bestSeller;
  }

  public function calOrder($day){

  }
}