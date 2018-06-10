<?php

namespace BenZee\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Hubtel\HubtelChannel;
use NotificationChannels\Hubtel\HubtelMessage;
use Illuminate\Notifications\Messages\MailMessage;

class RoomAllocation extends Notification implements ShouldQueue
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
                    ->subject('Room Allocation')
                    ->line($this->userDetails->fullname. ', this is to inform you that you have been allocated a '.
                    $this->bookingDetails->request->occupancy_type.
                    '. You are therefore required to make payment of your Rent (Hostel Fees) which is $' . $this->bookingDetails->amount . ' (USD) for the duration of '.
                    $this->bookingDetails->request->duration .' before ' . $this->bookingDetails->fee_end_date->format('F d, Y') . '.')
                    ->line('We only accept Cash being full payment of your Rent within 30 days.')
                    ->line('Kindly note that, your may loose your accommodation if payment is not made within 30 days. We also wish to remind you that the Rent excludes your Electricity Bill fro your stay.')
                    ->line('Payment of Rent(Hostel Fee) is currently by cash at the premises of the Residency to Management. You may locate the Residence by clicking the button below')
                    ->action('Locate BenZee Residency', url('https://goo.gl/maps/JaFbTCcfMym'))
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
            ->content($this->userDetails->fullname. ', this is to inform you that you have been allocated a '.$this->bookingDetails->request->occupancy_type
            .'. You are therefore required to make payment of your Rent (Hostel Fees) which is $' . $this->bookingDetails->amount . ' (USD) for the duration of '.
            $this->bookingDetails->request->duration . ' before ' . $this->bookingDetails->fee_end_date->format('F d, Y') . '. We only accept Cash being full payment or half payment of your Rent within 30 days and the remaining half paid within 30 days days of initial payment. '.
             'Payment of Rent (Hostel Fee) is currently by cash at the premises of the Residency to Management. You may locate the Residence with the link => ' .url('https://goo.gl/maps/JaFbTCcfMym'));
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
