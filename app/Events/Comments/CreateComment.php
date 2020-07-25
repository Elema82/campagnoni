<?php

namespace App\Events\Comments;

use App\Api\V1\BaseModel;
use App\api\V1\Comments\Comment;
use App\Events\Event;

/**
 * Class CreateComment
 * @package app\Events\Comments
 */
class CreateComment extends Event
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var Comment
     */
    private $comment;

    /**
     * @var BaseModel
     */
    private $entity;

    /**
     * @param Comment $comment
     * @param array $data
     */
    public function __construct(BaseModel $entity,Comment $comment, array $data)
    {
        $this->comment = $comment;
        $this->data = $data;
        $this->entity = $entity;
    }

    /**
     * @return Data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return BaseModel
     */
    public function getParentEntity()
    {
        return $this->entity;
    }
}