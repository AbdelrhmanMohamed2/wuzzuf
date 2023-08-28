<?php

namespace App\Listeners;

use App\Events\BroadcastNotification;
use App\Events\EmployeeRejected;
use App\Notifications\NotifyEmployeeRejected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class EmployeeJobRejected
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
    public function handle(EmployeeRejected $event): void
    {
        Notification::send($event->employee->user, new NotifyEmployeeRejected($event->job, $event->employee));
        $lastNotification = $event->employee->user->notifications()->latest()->first();
        event(new BroadcastNotification($event->employee->user, $lastNotification));
    }
}
