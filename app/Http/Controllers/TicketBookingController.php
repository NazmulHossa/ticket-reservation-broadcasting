<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MyCustomNotification;

class TicketBookingController extends Controller
{
    public function book(Request $request)
    {
        // Ticket booking logic (dummy)
        $message = "A ticket was booked for You";

        // Fire Event
        event(new MyCustomNotification($message));

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
}
