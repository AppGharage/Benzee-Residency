<?php

namespace BenZee\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Hubtel\HubtelChannel;
use NotificationChannels\Hubtel\HubtelMessage;

class AdminRequestRecieved extends Notification implements ShouldQueue
{
    use Queueable;

    protected $userDetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userDetails)
    {
        //
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
        return ['mail', HubtelChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {   
        $url =env("APP_URL");

        return (new MailMessage)
                    ->from("benzee@gmail.com","BenZee Residency")
                    ->subject('New Accommodation Request')
                    ->line($this->userDetails->fullname. ', you have recieved a new Request for Accommodation. 
                        Kindly,confirm availablity and Revert.')
                    ->action("View Request", $url)
                    ->line('Thank you!');
    }

    /**
     * Get the sms representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSMS($notifiable)
    {
        return (new HubtelMessage)
			->from("BenZee")
			->to($this->userDetails->telephone)
            ->content($this->userDetails->fullname.", you have recieved a new Request for Accommodation. Kindly,confirm availablity and Revert. Login Now here =>". env("APP_URL"));
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
