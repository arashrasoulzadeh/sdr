<?php

namespace App\Interfaces;

use App\Contracts\NotificationRepositoryInterface;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\DB;

/**
 * NotificationRepository
 */
class NotificationRepository implements NotificationRepositoryInterface
{

    public function queueNotification( $to, $name, $message, $type )
    {
        $type_int = $type === 'email' ? 0 : 1;
        $row_id = DB::table( 'notifications' )->insertGetId
        (
            [
                'type' => $type_int,
                'destination' => $to,
                'message' => $message,
                'name' => $name,
            ]
        );
        return event( new NotificationEvent( $row_id, $to, $name, $message, $type ) );
    }

    public function markNotificationAsDone( $id ): void
    {
         DB::statement( DB::raw( 'update `notifications` set `success` = 1 where id = ?' ), [ $id ] );
    }
}
