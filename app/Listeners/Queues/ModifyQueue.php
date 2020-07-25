<?php

namespace App\Listeners\Queues;

use App\Events\Queues\UpdateQueue;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class ModifyQueue
 * @package app\Listeners\Queues
 */
class ModifyQueue
{
    /**
     * @param UpdateQueue $event
     */
    public function handle(UpdateQueue $event)
    {
        $queue = $event->getQueue();
        $queue->fill($event->getRequest()->all());

        if ($queue->isInvalid()) {
            throw new StoreResourceFailedException('Missing required fields or invalid information.', $queue->getErrors());
        }

        $queue->save();
    }
}