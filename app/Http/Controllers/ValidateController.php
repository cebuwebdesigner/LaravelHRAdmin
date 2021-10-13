<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

//use App\Helper\Helper;

class ValidateController extends Controller
{
    //
    public function getIp(){
      foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
          if (array_key_exists($key, $_SERVER) === true){
              foreach (explode(',', $_SERVER[$key]) as $ip){
                  $ip = trim($ip); // just to be safe
                  if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                      return $ip;
                  }
              }
          }
      }
      return request()->ip(); // it will return server ip when no client ip found
  }


  public function randHash($len=32){
     return substr(md5(openssl_random_pseudo_bytes(20)),-$len);
  }


    public function validation(Request $request){
      

       $data2 = $request->session()->get("sessionkey");
       $username=$request->input('username'.$data2); 
       $password=$request->input('password'.$data2); 
     
      $passwordH = DB::table('users')->where('name', $username)->value('password');
     
      $pepper='@Trans-AsiaHR2017';
      $pwd_peppered = hash_hmac("sha256", $password,$pepper);

      if ($passwordH === null) {  echo "invalid access";  return redirect('/'); }

      if (hash_equals($pwd_peppered,$passwordH)) { 

         $id = DB::table('users')->where('name', $username)->value('id');
         
         $remember_token = $this->randHash();
         
         DB::table('users')
         ->where('id', $id)
         ->limit(1)
         ->update(array('remember_token' => $remember_token));

         $remember_token = DB::table('users')->where('name', $username)->value('remember_token');
         
         $ip = $this->getIp();
         $request->session()->put("sessionaccess",$id.$ip.$remember_token);
         return redirect('/dashboard');
       }else{ 
         return redirect('/');
        }

    
       
    }
       


}
