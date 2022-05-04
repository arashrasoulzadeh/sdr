<?php

namespace App\Listeners;

use Amqp;
use App\Events\NotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificationListener implements ShouldQueue
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
     * @param  \App\Events\NotificationEvent $event
     *
     * @return void
     */
    public function handle( NotificationEvent $event)
    {
        Amqp::publish( 'notification', json_encode( $event ) , [ 'queue' => 'messages' ] );
    }
}
