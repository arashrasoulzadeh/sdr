<?php

namespace App\Jobs;

use App\Contracts\NotificationRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SendEmailNotificationJob extends Job
{
    /**
     * @var array input data.
     */
    private array $data = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( array $data = [] )
    {
        $this->data = Arr::only( $data, [ 'to', 'name', 'message', 'row_id' ] );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(  NotificationRepositoryInterface $notificationRepository )
    {
        $this->validate();

        $destination = $this->data[ 'to' ];
        $name = $this->data[ 'name' ];
        $text = $this->data[ 'message' ];
        $id = $this->data[ 'row_id' ];

        Mail::raw( $text, function( $message ) use ( $destination, $name, $id, $notificationRepository )
        {
            $message->to( $destination, $name )->subject( 'sample' );
            $notificationRepository->markNotificationAsDone( $id );
            dump( 'processed notification ' . $id );

        });
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        if ( !isset( $this->data[ 'to' ], $this->data[ 'name' ], $this->data[ 'message' ] ) )
        {
            throw new \Exception( 'invalid data!' );
        }
    }

}
