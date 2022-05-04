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

    /**
     * mark notification as done.
     *
     * @param $id
     *
     * @return void
     */
    public function markNotificationAsDone( $id ): void;
}
