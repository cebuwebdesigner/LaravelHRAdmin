<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

//use App\Helper\Helper;

class SavepostController extends Controller
{
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

    public function error(Request $request){
        return redirect('/');
    }


    public function postdata(Request $request){
         $ip = $this->getIp();
         

       $position=$request->input('position'); 
       $qualifications=$request->input('qualifications'); 
       $status=$request->input('status'); 
       date_default_timezone_set('Asia/Manila');
       $datelog =  date('d-m-Y H:i:s'); 
       

       DB::insert('insert into careers (position,qualifications,dateentry,status) values (?, ?, ?, ?)', [$position,$qualifications,$datelog,$status]);



        return redirect('/posthiring');
        }

    
       
    
       


}
