<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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


    public function loadpage(Request $request){
  
        $ip = $this->getIp();
        $requestSession = $request->session()->get("sessionaccess");
        $requestArr=explode($ip,$requestSession); $id=$requestArr[0];
        $remember_token = DB::table('users')->where('id',$id)->value('remember_token');
      
        if($requestSession!=$id.$ip.$remember_token){
            return redirect('/');
        }

  
     $loadpage=$request->input('p'); 
   // $withdata='off';
    switch($loadpage){
        case "applicants":    
            $data = DB::select('select * from emplpage1 WHERE emailaddress!="" AND stats!="hired" AND stats!="process"');
           break;    
        case "process":    
            $data = DB::select('select * from emplpage1 WHERE stats="process"');
           break;
        case "hired":    
            $data = DB::select('select * from emplpage1 WHERE stats="hired"');
            break;
            case "":  $loadpage = "applicants"; 
                $data = DB::select('select * from emplpage1 WHERE emailaddress!="" AND stats!="hired" AND stats!="process"');
               break;           
             }


    $keys = array("thepage"=>$loadpage);
    
    return view('dashboard')->with($keys)->with(['infos'=>$data]);


    }
     
    
    
}
