<?php

namespace App\Events\Tasks;

use App\Api\V1\Queues\Model\Queue;
use App\api\V1\Task\Task;
use App\api\V1\Task\TaskStatus;
use App\Api\V1\Users\Model\User;
use App\Events\Event;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class UpdateTask
 * @package app\Events
 */
class UpdateTask extends Event
{

    /**
     * @var array
     */
    private $data;

    /**
     * @var Task
     */
    private $task;

    /**
     * @var User
     */
    private $user;

    /**
     * @var array
     */
    private $updatedFields;

    /**
     * UpdateTask constructor.
     * @param Task $task
     * @param array $data
     */
    public function __construct(Task $task, array $data, $user)
    {
        $this->task = $task;
        $this->user = $user;
        $this->data = $data;

        $updatedFields = [];
        foreach($data as $key => $value){
            if($key == 'assigned') {

                $assignedValue = ($task->users_id != NULL) ? (User::where('id', '=', $task->users_id)->first()):"None";
                $oldAssigned = ($assignedValue != "None") ? $assignedValue->fullname() : $assignedValue;

                $userValue = User::find($value);

                $updatedFields[$key]['old'] = $oldAssigned;
                $updatedFields[$key]['new'] = !$userValue ? 'None' : $userValue->fullname();
            }
            elseif($key == 'status' && !is_null($data['status'])) {
                 try{
                     $status = TaskStatus::where('id', '=', $data['status'])->first();
                 } catch(\Exception $e){
                    throw new ConflictHttpException('Task status not exist');
                 }
                 $oldStatus = TaskStatus::where('id', '=', $task->task_status_id)->first();

                 $updatedFields[$key]['old'] = $oldStatus->name;
                $updatedFields[$key]['new'] = $status->name;


            }
            elseif($key == 'queue') {

                 $queue = Queue::find($data['queue']);

                 $queueValue = ($task->queues_id != NULL) ? (Queue::where('id', '=', $task->queues_id)->first()):"None";
                 $oldQueue = ($queueValue != "None") ? $queueValue->name : $queueValue;

                 $updatedFields[$key]['old'] = $oldQueue;
                 $updatedFields[$key]['new'] = !$queue? 'None' : $queue->name;

            }
            else {
                if($task->$key != $value) {
                    $updatedFields[$key]['old'] = $task->$key;
                    $updatedFields[$key]['new'] = $value;
                }
            }
        }

        $this->updatedFields = $updatedFields;


    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return Task
     */
    public function getTask()
    {
        return $this->task;
    }

    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function getUpdatedFields()
    {
        return $this->updatedFields;
    }
}