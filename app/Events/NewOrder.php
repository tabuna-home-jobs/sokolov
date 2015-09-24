<?php

namespace App\Events;


use Illuminate\Queue\SerializesModels;

class NewOrder extends Event
{
    use SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($newOrder)
    {
        $this->order = $newOrder;
        dd($this->order);
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
