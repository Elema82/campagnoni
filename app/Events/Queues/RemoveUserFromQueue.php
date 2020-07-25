<?php

namespace App\Events\Queues;

use App\Api\V1\Queues\Model\Queue;
use App\Api\V1\Users\Model\User;

/**
 * Class RemoveUserFromQueue
 * @package App\Events\Queues
 */
class RemoveUserFromQueue
{
    /**
     * @var Queue
     */
    protected $queue;

    /**
     * @var User
     */
    protected $user;

    /**
     * RemoveUserFromQueue constructor.
     * @param Queue $queue
     * @param User $user
     */
    public function __construct(Queue $queue, User $user)
    {
        $this->queue = $queue;
        $this->user = $user;
    }

    /**
     * @return Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

}