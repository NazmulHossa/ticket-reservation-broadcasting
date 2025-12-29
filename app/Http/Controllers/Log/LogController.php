<?php

namespace App\Http\Controllers\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogController extends Controller
{

    

    public function logDemo(Request $request)
    {
        $logTime = now()->toTimeString();
        $ip = $request->ip();


        Log::info("Page accessed successfully. User Ip: $ip at $logTime");

    }

    public function userProcess(Request $request)
    {
        $logTime = now()->toTimeString();
        $ip = $request->ip();

        Log::info("Start user Create Process");
        $this->createUser($ip, []);
        
        Log::info("Start user profile Create Process");
        $this->profileCreate($ip, []);
        
        Log::info("Start user payment account Create Process");
        $this->paymentAccountCreate($ip, []);
        

    }

    public function createUser($ip, $data){
        
        $logTime = now()->toTimeString();

        Log::info("User Created from Ip: $ip at $logTime");
    }
    
    public function profileCreate($ip, $data){
        
        $logTime = now()->toTimeString();

        Log::info("User profile Created from Ip: $ip at $logTime");
    }
    
    public function paymentAccountCreate($ip, $data){
        
        $logTime = now()->toTimeString();

        Log::error("User account information not provide");
    }

}
