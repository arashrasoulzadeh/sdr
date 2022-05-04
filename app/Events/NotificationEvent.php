<?php

namespace App\Events;

class NotificationEvent extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( public int $row_id, public string $to, public string $name, public string $message, public string $type )
    {
        //
    }
}
