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
                    ' is available, with your Rent (Hostel Fee) being $' . $this->bookingDetails->amount . ' (USD) for the duration of '.
                    $this->bookingDetails->request->duration .' which excludes your Electricity Bill during your stay. To calculate the Ghana Cedi Equivalent of your rent you may go to => https://currenci.netlify.com')
                    ->line('You are to pay Non-Refunable Deposit of GHS 210.00 within 7 days as non-refundable Booking Fee to secure your accommodation.')
                    ->line('Kindly note that, your booking expires on '.
                    $this->bookingDetails->end_date->format('F d, Y'). ' . The booking fee after payment of your
                     rent will be used as a deposit against damages during your stay. To pay your booking, kindly click the Pay Booking button below
                     or with the link => '. url('/booking/pay/'.$this->bookingDetails->id))
                     ->line(' ')
                    ->line('Below are the steps to pay your Booking Fee; ')
                    ->line('1. Get your Mobile Money Registered Handset/Phone Ready. 
                        (You will need a Registered Mobile Money Number to make payment)')
                    ->line('2. Top Up your Mobile Money account with GHS 210.00 . ')
                    ->line('3. Click on the Pay booking button or use the booking link provided in either the SMS or EMail')
                    ->line('4. Fill the payment details by selecting the Network Operator of your Mobile Money Account,
                         with the Name and Telephone number of your Mobile Money Account.')
                    ->line('5. Complete the Transaction on your mobile Money Handset by authorizing the payment on the 
                        confirmation screen on your Mobile Money handset')
                    ->line('Kindly Note that in a case where you do not have a mobile money account, A family or a friend with a Mobile Money account
                    can make payment on your behalf with the Booking link and the Instructions above. ')
                    ->line(' ')
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
            ->content('This is to confirm that your request for '.$this->bookingDetails->request->occupancy_type
            .' is available, with your Rent (Hostel Fee) being $' . $this->bookingDetails->amount .
            ' (USD) which excludes your Electricity Bill during your stay. You are to pay GHS 210.00 within 7 days as non-refundable Booking Fee to secure your accommodation. To pay your booking, tap the link => '.
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
