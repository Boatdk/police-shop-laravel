<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Product;
use App\Order;
use App\Users;

class orderController extends BaseController{
  public function index(Request $req){
    $email = $req->session()->get('user');
    $customerId = $req->session()->get('id');
    $count = Cart::countCart($customerId);
    $req->session()->put('count', $count);
    $user = Users::getUserFromEmail($email);
    $user_code = $user[0]->user_code;
    $getOrder = Order::getOrderUserId($user_code);
    $orderId = $getOrder[0]->order_id;
    $item = Cart::getCartOrderId($orderId);
    $product= array();
    foreach($item as $items){
      $itemCode = $items->product_code;
      $add = array_push($product, Product::getProductFromCode($itemCode));
    }
    return view('pages.order')->with('item', $item)->with('order', $getOrder)->with('product', $product);
  } 

  public function summaryOrder(Request $req){
    $orderId = $_REQUEST['orderId'];
    $item = Cart::getCartOrderId($orderId);
    $price = Cart::sumCartOrderId($orderId);
    $updatePrice = Order::updatePrice($orderId, $price);
    $getOrder = Order::getOrder($orderId);
    $updateStatus = Order::updateStatus($orderId);
    $clearCart = Cart::clearCart($orderId);
    $customerId = $req->session()->get('id');
    $data = 1;
    return $data;
  }

  public function successPayment(){
    
  }
}