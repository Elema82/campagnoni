<?php

namespace App\Listeners\Comments;

use App\Events\Comments\CreateComment;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class SaveComment
 * @package App\Listeners
 */
class SaveComment
{
    /**
     * @param \App\Events\Comments\CreateComment $event
     */
    public function handle(CreateComment $event)
    {
        $comment = $event->getComment();
        $data = $event->getData();
        $parentEntity = $event->getParentEntity();

        $comment->fill($data);

        $validator = \Validator::make($data, $comment->getRules());

        if ($validator->fails()) {
            throw new StoreResourceFailedException("Missing required fields or invalid information.",$validator->errors());
        }

        $comment->save();

        $parentEntity->comments()->save($comment);
    }
}