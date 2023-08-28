<?php

namespace App\Listeners;

use App\Events\EmployeeAppliedToJob;
use App\Events\BroadcastNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyCompanyNewJobApplication;

class NewEmployeeApplication
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
    public function handle(EmployeeAppliedToJob $event): void
    {
        Notification::send($event->company->user, new NotifyCompanyNewJobApplication($event->job, $event->employee));
        $lastNotification = $event->company->user->notifications()->latest()->first();
        event(new BroadcastNotification($event->company->user, $lastNotification));
    }
}
