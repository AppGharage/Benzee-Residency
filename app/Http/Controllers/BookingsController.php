<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use App\Request as AccommodationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'request_id' => 'required|string|max:8',
            'user_id' => 'required|string|max:8',
        ]);
        
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

        //Get Current Date
        $currentDate = Carbon::now();
        $endDate = $currentDate->addDays(29);
        $endDate = Carbon::parse($endDate);
        
        $accommodationRequestId = $request->input('request_id');

        //Create Booking
        $bookings = new Booking([
                'id' => randomString(),
                'amount'  => $request->input('amount'),
                'request_id'  => $accommodationRequestId,
                'user_id'   => $request->input('user_id'),
                'end_date' => $endDate

        ]);
       
        $bookings->save();

        AccommodationRequest::where('id', $accommodationRequestId)->update(['is_closed'=>1]);

        return redirect()->back()->with('alert-success', 'Awesome ! Your Response was sent!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
