<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index()
    {
        $allSessionData = Session::all();
                
        return view('session', compact('allSessionData'));
    }
    
    
    public function setSession()
    {
        Session::put('userName', 'Tanveer');
        Session::put('userEmail', 'tanveer@tahoo.com');
        Session::put('userContact', '012365895');

        Session::put([
            'presentAddress' => 'my Present Addr',
            'permanentAddress' => 'my Permanent Addr',
        ]);

        return redirect()
            ->route('session-index')
            ->with('success', 'Session message set successfully');
    }

    public function deleteSession()
    {
        Session::forget('userName');   
        Session::forget(['userEmail', 'userContact']);

        return redirect()
            ->route('session-index')
            ->with('warning', 'Session message delete successfully');
    }
}
