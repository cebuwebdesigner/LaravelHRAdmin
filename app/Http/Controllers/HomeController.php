<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request){


      $loadpage=$request->input('p'); 
     if($loadpage=="logout"){$request->session()->flush(); return redirect('/');}

        // $request->session()->flush();
         $data = $request->session()->getId();
         $request->session()->put("sessionkey", $data);
         $keys = array("sessionkey" => $data);
        return view('welcome')->with($keys);
    
    }
}
