<?php

namespace App\Events\Queues;

use App\Api\V1\Queues\Model\Queue;
use Dingo\Api\Contract\Http\Request;

/**
 * Class UpdateQueue
 * @package App\Events\Queues
 */
class UpdateQueue
{
    /**
     * @var Queue
     */
    protected $queue;

    /**
     * @var Request
     */
    protected $request;

    /**
     * AddNewQueue constructor.
     * @param Queue $queue
     * @param Request $request
     */
    public function __construct(Queue $queue, Request $request)
    {
        $this->queue = $queue;
        $this->request = $request;
    }

    /**
     * @return Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

}