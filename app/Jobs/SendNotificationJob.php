<?php

namespace App\Jobs;

use Illuminate\Support\Arr;

class SendNotificationJob extends Job
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
        $this->data = Arr::only( $data, [ 'row_id', 'to', 'name', 'message', 'type' ] );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->validate();
        if ( $this->data[ 'type' ] == 'sms' )
        {
            dispatch( new SendSMSNotificationJob( $this->data ) );
        }
        if ( $this->data[ 'type' ] == 'email' )
        {
            dispatch( new SendEmailNotificationJob( $this->data ) );
        }
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        if ( !isset( $this->data[ 'to' ], $this->data[ 'name' ], $this->data[ 'message' ], $this->data[ 'type' ], $this->data[ 'row_id' ] ) )
        {
            throw new \Exception( 'invalid data!' );
        }
    }

}
