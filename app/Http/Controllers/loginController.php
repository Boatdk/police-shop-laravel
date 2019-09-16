<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class loginController extends BaseController
{
    public function index(){
      return view('pages.login');
    }

    public function login(Request $req){
      $username = $req->input('username');
      $password = $req->input('password');
      $checkLogin = DB::table('user')->where(['email'=>$username, 'password' => $password])->get();
      if(count($checkLogin) > 0){
        $req->session()->put('user', $username);
        $userLogin = $req->session()->get('user');
        return redirect()->action('homeController@index', [$userLogin]);
      }
      else{
        echo "fail";
      }
    }

    public function logou(Request $req){
      $req->session()->flush();
    }

}
