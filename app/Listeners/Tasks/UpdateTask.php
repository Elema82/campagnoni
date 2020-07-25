<?php

namespace App\Listeners\Tasks;

use Dingo\Api\Exception\StoreResourceFailedException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use App\Events\Tasks\UpdateTask as UpdateTaskEvent;

/**
 * Class UpdateTask
 * @package App\Listeners\Tasks
 */
class UpdateTask
{
    /**
     * @param UpdateTaskEvent $event
     */
    public function handle(UpdateTaskEvent $event)
    {
        $task = $event->getTask();
        $data = $event->getData();

        // disabled change this fields
//        unset($data['created_by']);
//        unset($data['company_id']);
//        unset($data['task_status_id']);

        $extraValidation = [];

        if (array_key_exists('assigned', $data)) {
            $data['users_id']  = $data['assigned'];
            unset($data['assigned']);


            if($data['users_id'] != null)
                $extraValidation['users_id'] = 'integer|exists:users,id';

        }

        if (array_key_exists('queue', $data)) {
            $data['queues_id'] = $data['queue'];
            unset($data['queue']);

            if(!is_null($data['queues_id']))
                $extraValidation['queues_id'] = 'integer|exists:queues,id';
        }

        if (array_key_exists('due_date', $data)) {
            $extraValidation['due_date'] = 'date';
        }

        $updatedRules =  array_merge($task->getRules(), $extraValidation);

        $validator = \Validator::make(array_merge($task->toArray(), $data), $updatedRules);

        if ($validator->fails()) {
            throw new StoreResourceFailedException("Missing required fields or invalid information.",$validator->errors());
        }

        $task->fill($data);

        if($task->users_id == null && $task->queues_id == null)
            throw new ConflictHttpException('Task must be assigned to a user or to a queue.');

        if(isset($data['due_date']) && !$task->validateDueDate($data['due_date']))
            throw new ConflictHttpException('Invalid due date. This date should be greater than today');

        $task->save();


    }
}