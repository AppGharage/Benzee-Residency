<?php

namespace BenZee\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Hubtel\HubtelChannel;
use NotificationChannels\Hubtel\HubtelMessage;
use Illuminate\Notifications\Messages\MailMessage;

class BookingPayment extends Notification implements ShouldQueue
{
    use Queueable;

    protected $userDetails;
    protected $bookingDetails;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userDetails, $bookingDetails)
    {
        //
        $this->userDetails = $userDetails;
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
                    ->line($this->userDetails->fullname.', this is to confirm that you have paid your Non-Refunable Deposit and succesfully booked a 
                    '.$this->bookingDetails->request->occupancy_type.' for '. $this->bookingDetails->request->duration)
                    ->line('The Rent for your accommodation is $'.$this->bookingDetails->amount. ' (USD)')
                    ->line('Kindly note, we will get back to you soon for payment of your Rent (Hostel Fee)')
                    ->line('We are stoked to have you become a Resident!');
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
                    ->content($this->userDetails->fullname. ', this is to confirm that you have paid your Non-Refunable Deposit and succesfully booked a '
                    .$this->bookingDetails->request->occupancy_type.' for ' . $this->bookingDetails->request->duration .
                    '. Your Rent for your accommodation is $'.$this->bookingDetails->amount .
                    '(USD). Kindly note, we will get back to you soon for payment of your Rent (Hostel Fee)');
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
