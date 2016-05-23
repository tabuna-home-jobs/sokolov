<?php

namespace app\Events;

use Illuminate\Queue\SerializesModels;

class NewOrder extends Event
{
    use SerializesModels;

    public $id;

    /**
     * Create a new event instance.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
