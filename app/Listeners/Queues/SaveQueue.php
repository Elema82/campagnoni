<?php

namespace App\Listeners\Queues;

use App\Events\Queues\CreateQueue;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class SaveQueue
 * @package app\Listeners\Queues
 */
class SaveQueue
{
    /**
     * @param CreateQueue $event
     */
    public function handle(CreateQueue $event)
    {
        $queue = $event->getQueue();
        $queue->fill($event->getRequest()->all());

        if ($queue->isInvalid()) {
            throw new StoreResourceFailedException('Missing required fields or invalid information.', $queue->getErrors());
        }

        $queue->company_id = $event->getRequest()->get('company')->id;
        $queue->save();
    }
}