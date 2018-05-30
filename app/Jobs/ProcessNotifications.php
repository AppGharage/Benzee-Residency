<?php

namespace BenZee\Jobs;

use Illuminate\Bus\Queueable;
use BenZee\Notifications\BookingSent;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use BenZee\Notifications\RequestRecieved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use BenZee\Notifications\AdminRequestRecieved;

class ProcessNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $admins;
    protected $notificationType;
    protected $bookingDetails;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $admins = null, $notificationType, $bookingDetails = null)
    {
        //
        $this->user = $user;
        $this->admins = $admins;
        $this->notificationType = $notificationType;
        $this->bookingDetails = $bookingDetails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $user = $this->user;
        $notificationType = $this->notificationType;
        $bookingDetails = $this->bookingDetails;

        if ($notificationType == "Request") {
            $admins = $this->admins;

            //Notify User
            $user->notify(new RequestRecieved($user));

            foreach ($admins as $admin) {
                //Notify Admin
                $admin->notify(new AdminRequestRecieved($admin));
            }
        } elseif ($this->notificationType == "Booking") {
            $user->notify(new BookingSent($user, $bookingDetails));
        }
    }
}
