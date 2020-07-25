<?php

namespace App\Listeners\Queues;

use App\Events\Queues\RemoveUserFromQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class RemoveUser
 * @package App\Listeners\Queues
 */
class RemoveUser
{
    /**
     * @param RemoveUserFromQueue $event
     */
    public function handle(RemoveUserFromQueue $event)
    {
        $queue = $event->getQueue();
        $user = $event->getUser();

        try {
            $queue->users()->findOrFail($user->id);
        } catch(ModelNotFoundException $e) {
            throw new ConflictHttpException('User is not associated to this queue.');
        }

        $queue->users()->detach([$user->id]);
    }
}