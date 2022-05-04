<?php

namespace App\Jobs;

use App\Contracts\NotificationRepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class SendSMSNotificationJob extends Job
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
    public function handle( NotificationRepositoryInterface $notificationRepository )
    {
        $this->validate();
        $username = 'guest';
        $password = 'guest';
        $destination = $this->data[ 'to' ];
        $id = $this->data[ 'row_id' ];
        $text = $this->data[ 'message' ];
        Http::post("https://se-1.cellsynt.net/sms.php?%20username=${username}&password=${password}&destination={$destination}&type=text&charset=UTF-%208&text={$text}&originatortype=alpha&originator=Demo");
        dump( 'processed notification ' . $id );
        $notificationRepository->markNotificationAsDone( $id );
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
