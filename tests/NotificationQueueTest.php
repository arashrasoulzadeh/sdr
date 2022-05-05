<?php

namespace Tests;

use App\Events\NotificationEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class NotificationQueueTest extends TestCase
{
    /**
     * test email queue.
     *
     * @return void
     */
    public function test_can_queue_email()
    {
        $fake = Event::fake();
        DB::setEventDispatcher($fake);

        $this->post(
            '/queue',
                    [
                        'to' => 'a@a.com',
                        'name' => 'sample name',
                        'message' => 'hello world!',
                        'type' => 'email'
                    ]
        );

        $this->assertEquals(
           200, $this->response->getStatusCode()
        );

        $fake->assertDispatched( NotificationEvent::class );
    }

    /**
     * test queue sms.
     *
     * @return void
     */
    public function test_can_queue_sms()
    {
        $fake = Event::fake();
        DB::setEventDispatcher($fake);

        $this->post(
            '/queue',
            [
                'to' => '09112403211',
                'name' => 'sample name',
                'message' => 'hello world!',
                'type' => 'sms'
            ]
        );

        $this->assertEquals(
            200, $this->response->getStatusCode()
        );

        $fake->assertDispatched( NotificationEvent::class );
    }

    /**
     * test validator works.
     *
     * @return void
     */
    public function test_can_not_queue_invalid_sms()
    {
        $fake = Event::fake();
        DB::setEventDispatcher($fake);

        $this->post(
            '/queue',
            [
                'name' => 'sample name',
                'message' => 'hello world!',
                'type' => 'sms'
            ]
        );

        $this->assertEquals(
            422, $this->response->getStatusCode()
        );

        $fake->assertNotDispatched( NotificationEvent::class );
    }

    /**
     * test validator works.
     *
     * @return void
     */
    public function test_can_not_queue_invalid_email()
    {
        $fake = Event::fake();
        DB::setEventDispatcher($fake);

        $this->post(
            '/queue',
            [
                'name' => 'sample name',
                'message' => 'hello world!',
                'type' => 'sms'
            ]
        );

        $this->assertEquals(
            422, $this->response->getStatusCode()
        );

        $fake->assertNotDispatched( NotificationEvent::class );
    }

}
