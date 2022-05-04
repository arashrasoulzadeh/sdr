<?php

namespace App\Console\Commands;

use Amqp;
use App\Jobs\SendNotificationJob;
use Illuminate\Console\Command;

class Worker extends Command
{

    protected $name      = 'run the worker';
    protected $signature = 'worker';

    public function handle()
    {
        $this->info( 'running.' );
        while ( true )
            Amqp::consume( 'messages', function ( $message, $resolver ) {
                try {
                    dispatch( new SendNotificationJob( json_decode( $message->body, true ) ) );
                    $this->info( 'consuming ' . $message->body_size . ' bytes of data.' );
                    $resolver->acknowledge( $message );
                }catch ( \Exception $exception )
                {
                    $this->error( $exception->getMessage() );
                }
            } );
        $this->info( 'completed!' );
    }
}
