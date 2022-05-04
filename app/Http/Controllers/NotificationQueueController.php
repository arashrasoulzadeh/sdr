<?php

namespace App\Http\Controllers;

use App\Interfaces\NotificationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationQueueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( public NotificationRepository $notificationRepository )
    {
        //
    }

    public function queue( Request $request )
    {
        $validator = Validator::make
        (
            $request->all(),
            [
                'to' => 'required',
                'name' => 'required|string',
                'message' => 'required|string',
                'type' => 'required|in:sms,email'
            ]
        );

        if ( count( $validator->errors() ) ) {
            return $validator->errors();
        }

        $result = $this->notificationRepository->queueNotification
        (
            $request->input( 'to' ),
            $request->input( 'name' ),
            $request->input( 'message' ),
            $request->input( 'type' )
        );

        return [];
    }
}
