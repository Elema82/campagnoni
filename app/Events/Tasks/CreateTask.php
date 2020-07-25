<?php

namespace App\Events\Tasks;

use App\api\V1\Task\Task;
use Illuminate\Broadcasting\PrivateChannel;

/**
 * Class CreateTask
 * @package app\Events
 */
class CreateTask
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
     * CreateTask constructor.
     * @param Task $task
     * @param array $data
     */
    public function __construct(Task $task, array $data)
    {
        $this->task = $task;
        $this->data = $data;
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

}