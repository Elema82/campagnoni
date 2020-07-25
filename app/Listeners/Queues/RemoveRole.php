<?php

namespace App\Listeners\Queues;

use App\Events\Queues\RemoveRoleFromQueue;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class RemoveRole
 * @package App\Listeners\Queues
 */
class RemoveRole
{
    /**
     * @param RemoveRoleFromQueue $event
     */
    public function handle(RemoveRoleFromQueue $event)
    {
        $queue = $event->getQueue();
        $role = $event->getRole();

        try {
            $queue->roles()->findOrFail($role->id);
        } catch(ModelNotFoundException $e) {
            throw new ConflictHttpException('Role is not associated to this queue.');
        }

        $queue->roles()->detach([$role->id]);
    }
}