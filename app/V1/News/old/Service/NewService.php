<?php

namespace App\Api\V1\News\Service;

use App\Api\V1\BaseService;
use App\Api\V1\Files\Model\File;
use App\Api\V1\News\Model\News;
use App\Api\V1\Users\Model\User;
use App\Events\Attachments\CreateFile;
use App\api\V1\Comments\Comment;
use App\Events\Comments\CreateComment;
use App\Events\Tasks\UpdateTask;
use App\Events\Tasks\CreateTask;
use Dingo\Api\Contract\Http\Request;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Illuminate\Support\Facades\Lang;

/**
 * Class NewService
 * @package App\Api\V1\News\Service
 */
class NewService extends BaseService
{
    /**
     * @param $data
     * @return News
     */
    public function add($data)
    {
        $new = new News();

        $validator = \Validator::make($data, $new->rules);

        if ($validator->fails()) {
            throw new ConflictHttpException("Missing required fields or invalid information.",$validator->errors());
        }

        $new->fill($data);
        $new->save();

        return $new;
    }

    /**
     * @param Product $task
     * @param Request $request
     * @return File
     */
    public function addAttachment(News $new, Request $request)
    {

        $attachment = new File();
        $attachment->setFolderName('task-attachment');
        event(new CreateFile($attachment, $request, $new));

        return $attachment;
    }

    public function update(News $new, $data)
    {
        event(new UpdateTask($new, $data));

        return $new;
    }
}