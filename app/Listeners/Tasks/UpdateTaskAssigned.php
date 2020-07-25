<?php

namespace App\Listeners\Task;

use App\Events\Tasks\UpdateTask;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class UpdateTaskAssigned
 * @package App\Listeners
 */
class UpdateTaskAssigned
{
    /**
     * @param UpdateTask $event
     */
    public function handle(UpdateTask $event)
    {
        $task = $event->getTask();
        $data = $event->getData();

        $data['users_id'] = (isset($data['assigned'])?$data['assigned']:$task->users_id);
        unset($data['assigned']);
        $task->fill($data);
        if($task->isInvalid()){
            throw  new StoreResourceFailedException("Missing required fields or invalid information.", $task->getErrors());
        }
        $task->save();
    }
}