<?php

namespace App\Listeners;

use App\Events\LeaveNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\LeaveNotificationEmail; // Assuming you have a Mail class setup

class SendLeaveNotificationEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(LeaveNotificationEvent $event)
    {
        $data = $event->data;

        \Mail::to($data['email'])->send(new LeaveNotificationEmail($data));
    }
}
