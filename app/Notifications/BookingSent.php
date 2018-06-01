<?php

namespace BenZee\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Hubtel\HubtelChannel;
use NotificationChannels\Hubtel\HubtelMessage;
use Illuminate\Notifications\Messages\MailMessage;

class BookingSent extends Notification implements ShouldQueue
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
                    ->from("benzee@gmail.com", "BenZee Residency")
                    ->subject('Accommodation Availability')
                    ->line($this->userDetails->fullname. ', this is to confirm that your request for '.
                    $this->bookingDetails->request->occupancy_type.
                    ' is available, with your Rent (Hostel Fee) being $' . $this->bookingDetails->amount . ' (USD) for the entire '.
                    $this->bookingDetails->request->duration .'.')
                    ->line('You are to pay Non-Refunable Deposit of GHS 210.00 within 7 days as booking fee to secure your accommodation.')
                    ->line('Kindly note that, your booking expires on '.
                    $this->bookingDetails->end_date->format('F d, Y'). ' . The booking fee after payment of your
                     rent will be used as a deposit against damages during your stay. To pay your booking, kindly click the Pay Booking button below
                     or with the link => '. url('/booking/pay/'.$this->bookingDetails->id))
                    ->action('Pay Booking', url('/booking/pay/'.$this->bookingDetails->id))
                    ->line('Thank you for expressing an interest in us!');
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
            ->content($this->userDetails->fullname. ', this is to confirm that your request for '.$this->bookingDetails->request->occupancy_type
            .' is available, with your Rent (Hostel Fee) being $' . $this->bookingDetails->amount . ' (USD) for the entire '.
            $this->bookingDetails->request->duration . '. You are to pay GHS 210.00 within 7 days as booking fee to secure your accommodation. To pay your booking, tap the link => '.
             url('/booking/pay/'.$this->bookingDetails->id));
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
