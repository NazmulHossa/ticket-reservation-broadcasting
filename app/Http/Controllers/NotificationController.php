<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class NotificationController extends Controller
{
    public function send(Request $request){
      $message= $request->query('message');
       event(new NewNotification($message));
       return response()->json([
        "status"=>"success",
        'message' =>'Notification event triggered'
       ]);
    }
}
