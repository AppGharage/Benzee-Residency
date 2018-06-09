<?php

namespace BenZee\Http\Controllers;

use BenZee\User;
use Carbon\Carbon;
use BenZee\Booking;
use Illuminate\Http\Request;
use BenZee\Jobs\ProcessNotifications;

class ResidentController extends Controller
{
    //
    public function allocate(Request $request)
    {
        $this->validate($request, [
            'room' => 'required|string|max:30'
        ]);
        
        $roomId = $request->input('room');
        $bookingId = $request->input('booking_id');
        $userId = $request->input('user_id');

        $currentDate = Carbon::now();
        $endDate = $currentDate->addDays(29);
        $endDate = Carbon::parse($endDate);

        $user = User::find($userId);
        $bookingDetails = Booking::find($bookingId);
        $notificationType = "Room Allocation";
        
        //Update Booking with Room and Fee Request
        Booking::where('id', $bookingId)->update(['room_id' => $roomId, 'has_fee_request' => 1, 'fee_end_date' => $endDate]);

        //Dispatch notifications
        ProcessNotifications::dispatch($user, null, $notificationType, $bookingDetails)->delay(now()->addMinutes(1));

        return redirect()->back()->with('status', 'Awesome ! Student has been allocated a room!.');
    }
}
