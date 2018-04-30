<?php

namespace App\Listeners;

use App\User;
use App\Events\ViolationCreated;
use App\Notifications\ViolationCreatedVerifier;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToVerifier
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ViolationCreated  $event
     * @return void
     */
    public function handle(ViolationCreated $event)
    {
        $violation  = $event->violation;
        // $user = User::find(3);
        $user = User::whereHas('roles', function($query){
            $query->where('role', 'Verifikator');
        })->first();

        $user->notify(new ViolationCreatedVerifier($violation));
    }
}
