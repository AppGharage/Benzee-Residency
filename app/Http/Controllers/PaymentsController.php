<?php

namespace BenZee\Http\Controllers;

use BenZee\User;
use BenZee\Payment;
use BenZee\Booking;
use Illuminate\Http\Request;
use BenZee\Jobs\ProcessNotifications;

class PaymentsController extends Controller
{
    //
    public function booking(Request $request)
    {
        //

        $this->validate($request, [
            'operator' => 'required|string|max:5',
            'account_holder' => 'required|string|max:30',
            'account_no' => 'required|string|max:10',
        ]);

        $networkOperator = $request->input('operator');
        $paymentType = $request->input('payment_type');
        $accountHolder = $request->input('account_holder');
        $accountNumber = $request->input('account_no');
        $userId = $request->input('user_id');
        $booking_id = $request->input('booking_id');



        if ($networkOperator != "mtn") {
            $option="ratm";
        } else {
            $option="rmtm";
        }

        $user = User::find($userId);

        $bookingFee = 1;
        $serviceFee = 10;

        $narration = 'Booking from '.$accountHolder .
                     ' with number ' . $accountNumber .
                     ' on behalf of ' . $user->fullname;

        $payload = [
            "price" => $bookingFee,
            "network" => $networkOperator,
            "recipient_number" => env("PAYMENT_NUMBER"),
            "sender" => $accountNumber,
            "option" => $option,
            "apikey" => env("PAYMENT_API_KEY")
        ];

        $data = json_encode($payload);

        $url = 'https://client.teamcyst.com/api_call.php';


        $additional_headers = array(
            'Content-Type: application/json'
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // $data is the request payload
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

        $results = curl_exec($ch);

        $response = json_decode($results, true);
        
        if ($response['status'] == "success") {
            $referenceId = $response['id'];

            //Create Booking
            $bookingPayment = new Payment([
                'user_id' => $userId,
                'payment_type'  => $paymentType,
                'amount_paid'  => $bookingFee,
                'service_fee'   => $serviceFee,
                'ref_id' => $referenceId,
                'narration' => $narration
            ]);

            
            if ($bookingPayment->save()) {
                Booking::where('id', $booking_id)->update(['is_paid'=>1]);

                //Get user Details
                $user = User::find($userId);
                //Get booking Details
                $bookingDetails = Booking::find($booking_id);
                //Set notification type
                $notificationType = "Booking-Payment";

                //Dispatch notifications
                ProcessNotifications::dispatch($user, null, $notificationType, $bookingDetails)->delay(now()->addMinutes(1));

                return redirect()->back()->with('status', 'Booking Payment Successful!');
            }
        } else {
            return redirect()->back()->with('error', 'Ooops! Payment was not Successful!');
        }
    }

    public function rent()
    {
    }
}
