<?php

namespace App\Jobs;

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
        $this->data = Arr::only( $data, [ 'to', 'name', 'message' ] );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->validate();
        $destination = $this->data[ 'to' ];
        $name = $this->data[ 'name' ];
        $text = $this->data[ 'message' ];

        Mail::raw( $text, function( $message ) use ( $destination, $name )
        {
            $message->to( $destination, $name )->subject( 'sample' );
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
