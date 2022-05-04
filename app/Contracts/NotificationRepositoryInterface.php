<?php

namespace App\Contracts;

interface NotificationRepositoryInterface
{
    /**
     * send a notification to queue.
     *
     * @param $to
     * @param $name
     * @param $message
     * @param $type
     *
     * @return mixed
     */
    public function queueNotification( $to, $name, $message, $type );
}
