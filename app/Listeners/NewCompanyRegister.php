<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\NewCompanyMail;
use App\Events\CompanyRegisterer;
use Illuminate\Support\Facades\Mail;
use App\Events\BroadcastNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCompanyNotification;

class NewCompanyRegister
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
    public function handle(CompanyRegisterer $event): void
    {
        // $admins = User::where('role', 'admin')->get();
        // Notification::send($admins, new NewCompanyNotification($event->company));

        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Notification::send($admin, new NewCompanyNotification($event->company));
            $lastNotification = $admin->notifications()->latest()->first();
            event(new BroadcastNotification($admin, $lastNotification));
            // Mail::to($admin)->send(new NewCompanyMail($event->company));
        }
        Mail::to($admins)->send(new NewCompanyMail($event->company));

    }
}
