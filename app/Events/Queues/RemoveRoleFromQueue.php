<?php

namespace App\Events\Queues;

use App\Api\V1\Queues\Model\Queue;
use App\Api\V1\Roles\Role;

/**
 * Class RemoveRoleFromQueue
 * @package App\Events\Queues
 */
class RemoveRoleFromQueue
{
    /**
     * @var Queue
     */
    protected $queue;

    /**
     * @var Role
     */
    protected $role;

    /**
     * RemoveRoleFromQueue constructor.
     * @param Queue $queue
     * @param Role $role
     */
    public function __construct(Queue $queue, Role $role)
    {
        $this->queue = $queue;
        $this->role = $role;
    }

    /**
     * @return Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

}