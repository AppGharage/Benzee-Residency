<?php

namespace BenZee-Residency\Channels;

use Illuminate\Notifications\Notification;

class SMSChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSMS($notifiable);

        // Send notification to the $notifiable instance...
        $body =[
            'query' =>
            [
                'to' => $message->to,
                'from' => 'BenZee',
                'msg' => $message->msg
            ]
        ];
        
        $client = new \GuzzleHttp\Client();

        $request = $client->request("POST", "https://sms-appgharage.herokuapp.com/api/v1/send", $body, [
            "headers" => [
            "Accept" => "application/json",
            "Content-type" => "application/x-www-form-urlencoded",
            "x-access-token" => env('SMS_API_KEY')
            ]]);
            
        $request= $client->send();  

        //$response = $request->getBody();

        //return $request->getStatusCode();
    }
}
