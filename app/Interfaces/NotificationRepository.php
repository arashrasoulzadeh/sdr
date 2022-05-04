<?php

namespace App\Interfaces;

use App\Contracts\NotificationRepositoryInterface;
use App\Events\NotificationEvent;

/**
 * NotificationRepository
 */
class NotificationRepository implements NotificationRepositoryInterface
{

    public function queueNotification( $to, $name, $message, $type )
    {
       return event( new NotificationEvent( $to, $name, $message, $type ) );
    }
}
