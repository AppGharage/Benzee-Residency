<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RequestRecieved extends Notification
{
    use Queueable;

    protected $accommodationDetails;
    protected $userDetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($accommodationDetails, $userDetails)
    {
        //
        $this->accommodationDetails= $accommodationDetails;
        $this->userDetails= $userDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', SMSChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($userDetails->name. 'We have recieved your Request for Accommodation. 
                        Kindly, wait as we confirm availablity and Revert.')
                    ->line('Thank you for your patience!');
    }

    /**
     * Get the sms representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSMS($notifiable)
    {   
        $message = "We have recieved your Request for Accommodation. Kindly, wait as we confirm availablity and Revert.";
        return (new SMSChannel());

    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
