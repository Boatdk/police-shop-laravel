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

class cartController extends BaseController{
  public function index(Request $req){
    $check = $req->session()->get('user');
    $customerId = $req->session()->get('id');
    $cart = Cart::getCart($customerId);
    $count = Cart::countCart($customerId);
    $req->session()->put('count', $count);
    $sum = Cart::sumCart($customerId);
    $product= array();
    foreach($cart as $carts){
      $itemCode = $carts->product_code;
      $add = array_push($product, Product::getProductFromCode($itemCode));
    }
    return view('pages.cart')->with('cart', $cart)->with('product', $product)->with('sum', $sum);
  }

  public function addCart(Request $req){
    $itemCode = $_REQUEST['itemCode'];
    $customerId = $_REQUEST['customerId'];
    $checkStock = Product::getProductFromCode($itemCode);
    $checkCart = Cart::getCartValid($itemCode, $customerId);
    $success['status'] = 0;
    if($checkStock[0]->volume > 0){
      if(!empty($checkCart)){
        $add = Cart::addCart($itemCode, $customerId, $checkStock[0]->price);
      }else if($checkCart[0]->qty > 0){
        $add = Cart::incCart($itemCode, $customerId, $checkCart[0]->qty, $checkStock[0]->price, $checkCart[0]->price);
      }
      $success['status'] = 1;
    }else{
      $success['status'] = 0;
    }
    return $success;
  }

  public function incCart(Request $req){
    $itemCode = $_REQUEST['itemCode'];
    $customerId = $_REQUEST['customerId'];
    $checkCart = Cart::getCartValid($itemCode, $customerId);
    $checkStock = Product::getProductFromCode($itemCode);
    $success['status'] = 0;
    if($checkStock[0]->volume > 0){
      if($checkCart && $checkCart[0]->qty < $checkStock[0]->volume){
        $inc = Cart::incCart($itemCode, $customerId, $checkCart[0]->qty, $checkStock[0]->price, $checkCart[0]->price);
        $success['status'] = 1;
      }else{
        $success['status'] = 2;
      }
    }
    
    return $success;
  }

  public function decCart(Request $req){
    $itemCode = $_REQUEST['itemCode'];
    $customerId = $_REQUEST['customerId'];
    $checkCart = Cart::getCartValid($itemCode, $customerId);
    $checkStock = Product::getProductFromCode($itemCode);
    $success['status'] = 0;
    if($checkCart && $checkCart[0]->qty != 0){
      $dec = Cart::decCart($itemCode, $customerId, $checkCart[0]->qty, $checkStock[0]->price, $checkCart[0]->price);
      $success['status'] = 1;
    }else{
      $delete = Cart::deleteCart($itemCode, $customerId);
      $success['status'] = 1;
    }

    return $success;
  }
  
}