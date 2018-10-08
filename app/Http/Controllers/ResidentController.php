<?php

namespace BenZee\Http\Controllers;

use BenZee\User;
use Carbon\Carbon;
use BenZee\Booking;
use BenZee\Request as AccommodationRequest;
use BenZee\Room;
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


    public function edit(User $user)
    {
        $rooms = Room::get();
        $booking = Booking::where('user_id', $user->id)->first();
        $user_room = Room::find($booking->room_id);
        
        return view('resident.edit', compact('rooms', 'user', 'user_room'));
    }

    public function create()
    {
        $rooms = Room::get();

        return view('resident.create', compact('rooms'));
    }

    public function update(Request $request)
    {
        $booking = Booking::where('user_id', $request->user_id)->first();
        $booking->room_id = $request->room;
        $booking->save();

        $user = User::find($request->user_id);

        $user->fullname = $request->fullname;
        $user->nationality = $request->nationality;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->save();

        return redirect()->back()->with('status', 'Awesome ! Resident Updated succesfully.');
    }

    public function store(Request $request)
    {
        //Function to Generate Random String
        function randomString($length = 8)
        {
            srand((double) microtime(true) * 1000000);
           
            $chars = array(
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
                'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
                '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
                'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                '1', '2', '3', '4', '5', '6', '7', '8', '9');
            
            $randstr = null;

            for ($rand = 0; $rand <= $length; $rand++) {
                $random = rand(0, count($chars) - 1);
                $randstr .= $chars[$random];
            }

            return $randstr;
        }

        $password =  explode(" ", $request->fullname)[0];

        //Saves User details in the User table
        $user = new User([
            'fullname' => $request->fullname,
            'telephone' => $request->telephone,
            'nationality' => $request->nationality,
            'email' => $request->email,
            'password' => bcrypt($password)
        ]);

        $user->save();

        //Saves accommodation Details in requests table
        $accommodationRequest = new AccommodationRequest([
            'occupancy_type' => $request->input('occupancy_type'),
            'institution'  => $request->input('institution'),
            'duration' => $request->input('duration'),
            'level'   => $request->input('level'),
            'user_id'   => $user->id,
        ]);

        $accommodationRequest->save();

        //Get Current Date
        $currentDate = Carbon::now();
        $endDate = $currentDate->addDays(7);
        $endDate = Carbon::parse($endDate);
        $generatedID = randomString();
        $userId = $request->input('user_id');
        
        $accommodationRequestId = $accommodationRequest->id;

        //Create Booking
        $booking = new Booking([
                'id' => $generatedID,
                'amount'  => '0',
                'request_id'  => $accommodationRequestId,
                'is_paid' => 1,
                'room_id' => $request->input('room'),
                'user_id'   => $user->id,
                'end_date' => $endDate
        ]);
        $booking->save();


        return redirect()->back()->with('status', 'Awesome ! Resident created succesfully.');
    }
}
