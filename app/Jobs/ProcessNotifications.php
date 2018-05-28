<?php

namespace BenZee\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use BenZee\Notifications\RequestRecieved;
use BenZee\Notifications\AdminRequestRecieved;

class ProcessNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $admin;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $admin)
    {
        //
        $this->user = $user;
        $this->admin = $admin;

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
        $admin = $this->admin;

        //Notify User
        $user->notify(new RequestRecieved($user));

        //Notify Admin
        $admin->notify(new AdminRequestRecieved($admin));
    }
}
