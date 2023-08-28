<?php

namespace App\Listeners;

use App\Events\EmployeeAccepted;
use App\Mail\JobAcceptEmployeeMail;
use Illuminate\Support\Facades\Mail;
use App\Events\BroadcastNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyEmployeeStatusAccepted;

class JobStatusAccepted
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmployeeAccepted $event): void
    {
        Notification::send($event->employee->user, new NotifyEmployeeStatusAccepted($event->job, $event->employee));

        $lastNotification = $event->employee->user->notifications()->latest()->first();
        event(new BroadcastNotification($event->employee->user, $lastNotification));

        Mail::to($event->employee->user)->send(new JobAcceptEmployeeMail($event->email, $event->job, $event->employee));
    }
}
