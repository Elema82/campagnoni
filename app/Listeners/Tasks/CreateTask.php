<?php

namespace App\Listeners\Tasks;

use App\api\V1\Task\TaskStatus;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class CreateTask
 * @package App\Listeners
 */
class CreateTask
{
    /**
     * @param \App\Events\Tasks\CreateTask $event
     */
    public function handle(\App\Events\Tasks\CreateTask $event)
    {
        $task = $event->getTask();
        $data = $event->getData();

        if (isset($data['assigned'])) {
            $data['users_id']  = $data['assigned'];
            unset($data['assigned']);
        }elseif(!isset($data['queue'])){
            throw new ConflictHttpException(Lang::get('task.taskInvalid'));
        }

        $initialType = TaskStatus::where('type', '=', TaskStatus::TYPE_TODO)->first();
        $data['task_status_id'] = (isset($data['status'])?$data['status']: $initialType->id);
        unset($data['status']);

        if (isset($data['queue'])) {
            $data['queues_id'] = $data['queue'];
            unset($data['queue']);
        }

        $newRules = [
            'users_id' => 'integer|exists:users,id',
            'queues_id' => 'integer|exists:queues,id'];

        if(isset($data['due_date']) && $data['due_date'] != "")
            $newRules = array_merge(['due_date' => 'date'], $newRules);

        $createdRules = array_merge($task->getRules(),$newRules);

        $validator = \Validator::make($data, $createdRules);

        if ($validator->fails()) {
            throw new StoreResourceFailedException("Missing required fields or invalid information.",$validator->errors());
        }

        $task->fill($data);

        if($task->due_date != null && !$task->validateDueDate($task->due_date))
            throw new ConflictHttpException('The due date is invalid. Date should be greater than today');

        $task->save();
    }
}