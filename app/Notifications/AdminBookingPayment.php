<?php

namespace BenZee\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Hubtel\HubtelChannel;
use NotificationChannels\Hubtel\HubtelMessage;
use Illuminate\Notifications\Messages\MailMessage;

class AdminBookingPayment extends Notification implements ShouldQueue
{
    use Queueable;

    protected $adminDetails;
    protected $bookingDetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($adminDetails, $bookingDetails)
    {
        //
        $this->adminDetails = $adminDetails;
        $this->bookingDetails = $bookingDetails;
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
        return (new MailMessage)
                    ->from("benzee@gmail.com", "BenZee Payment")
                    ->line($this->adminDetails->fullname.', this is to confirm payment of Booking fee by ' . $this->bookingDetails->user->fullname .' for a
                    '.$this->bookingDetails->request->occupancy_type.' for '. $this->bookingDetails->request->duration);
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
                    ->from("BenZee Pay")
                    ->to($this->adminDetails->telephone)
                    ->content($this->adminDetails->fullname. ', this is to confirm payment of Booking fee by ' . $this->bookingDetails->user->fullname .' for a '
                    .$this->bookingDetails->request->occupancy_type.' for ' . $this->bookingDetails->request->duration);
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
