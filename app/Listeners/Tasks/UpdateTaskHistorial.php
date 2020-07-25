<?php

namespace App\Listeners\Tasks;

use App\Events\Tasks\UpdateTask;

/**
 * Class UpdateTaskHistorial
 * @package App\Listeners\Tasks
 */
class UpdateTaskHistorial
{
    /**
     * @param UpdateTask $event
     */
    public function handle(UpdateTask $event)
    {
        $task = $event->getTask();
        $updatedFields = $event->getUpdatedFields();
        $user = $event->getUser();

        if (array_key_exists('assigned',$updatedFields)){
            $oldUser = $updatedFields['assigned']['old'];
            $newUser = $updatedFields['assigned']['new'];
            $task->addHistory($user, 'Made changes', 'Assignee', (($oldUser != '')?$oldUser:'None'), $newUser);
        }

        if (array_key_exists('status',$updatedFields)){
            $oldStatus = $updatedFields['status']['old'];
            $status = $updatedFields['status']['new'];
            $task->addHistory($user, 'Made changes', 'Status', $oldStatus, $status);
        }

        if (array_key_exists('queue',$updatedFields)){
            $oldQueue = $updatedFields['queue']['old'];
            $queue = $updatedFields['queue']['new'];
            $task->addHistory($user, 'Made changes', 'Queue', $oldQueue, $queue);
        }

        if (array_key_exists('title',$updatedFields) or array_key_exists('description',$updatedFields) or array_key_exists('due_date',$updatedFields)){
            $task->addHistory($user, 'Made changes', 'Update Task', '', '');
        }

    }
}