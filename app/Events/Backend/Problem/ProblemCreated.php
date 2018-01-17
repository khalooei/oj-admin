<?php

namespace App\Events\Backend\Problem;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProblemCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $problem;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($problem)
    {
        $this->problem = $problem;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
