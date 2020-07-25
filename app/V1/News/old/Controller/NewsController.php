<?php

namespace App\Api\V1\News\Controller;

use App\Api\V1\BaseController;
use App\Api\V1\Files\Model\File;
use App\api\V1\Comments\Comment;
use App\Api\V1\News\Model\News;
use App\Http\Requests\Group;
use App\Http\Requests\Transformer\ModelTransformer;
use Dingo\Api\Contract\Http\Request;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class NewsController
 * @package App\Api\V1\News\Controller
 */
class NewsController extends BaseController
{
    /**
     * Get a list of all tasks
     * @param Request $request
     */
    public function index(Request $request)
    {
        if (!$this->request->get('order')) {
            $request['order'] = 'ISNULL(due_date), due_date';
        }

        $news = News::all();
        $news = $news->get();
        return compact('news');
    }

    public function show(News $new)
    {
        return compact('new');
    }

    public function destroy(News $task)
    {
        $task->delete();
        return "Noticia eliminada.";
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $new = (new NewService())->add($data);

        return "Noticia agregada";
    }


    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function update(Request $request, Product $task)
    {
        $this->isGranted('tasks', 'edit');

        $task = (new TaskService())->update($task, $request->all(), $this->currentUser());

        return $this->item($task, new ModelTransformer(Group::ALL))->setStatusCode(200);
    }

    /**
     * @return \Dingo\Api\Http\Response
     */
    public function getStatuses()
    {
        $this->isGranted('tasks', 'edit');
        $status = TaskStatus::all();

        return $this->collection($status, new ModelTransformer(Group::VIEW));
    }


    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function setStatus(Request $request, Product $task)
    {
        $user = $this->currentUser();
        $data =  $request->all();
        $this->isGranted('tasks', 'edit');
        $task = (new TaskService())->setStatus($task,$data, $user);

        return $this->item($task, new ModelTransformer(Group::ALL))->setStatusCode(200);
    }

    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function setAssigned(Request $request, Product $task)
    {
        $user = $this->currentUser();
        $data =  $request->all();
        $this->isGranted('tasks', 'edit');
        $task = (new TaskService())->setAssigned($task, $data, $user);

        return $this->item($task, new ModelTransformer(Group::ALL))->setStatusCode(200);
    }

    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function addAttachment(Request $request, Product $task)
    {
        $myTasks = $task->getMyTasks($request, $task->id)->get();
        if($myTasks->count() === 0) {
            throw new AccessDeniedHttpException("Unauthorized");
        }

        $attachment = (new TaskService())->addAttachment($task, $request);

        return $this->item($attachment, new ModelTransformer(Group::ALL))->setStatusCode(201);
    }

    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function getAttachments(Request $request, Product $task)
    {
        $myTasks = $task->getMyTasks($request, $task->id)->get();
        if($myTasks->count() === 0) {
            throw new AccessDeniedHttpException("Unauthorized");
        }
        return $this->collection($task->attachments, new ModelTransformer(Group::ALL));
    }

    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function getComments(Request $request, Product $task)
    {
        $myTasks = $task->getMyTasks($request, $task->id)->get();
        if($myTasks->count() === 0) {
            throw new AccessDeniedHttpException("Unauthorized");
        }

        return $this->collection($task->comments, new ModelTransformer(Group::ALL));
    }

    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function addComment(Request $request, Product $task)
    {
        $user = $this->currentUser();

        $myTasks = $task->getMyTasks($request, $task->id)->get();
        if($myTasks->count() === 0) {
            throw new AccessDeniedHttpException("Unauthorized");
        }

        $data = $request->all();
        $data['users_id'] = $user->id;

        if ($comment = (new TaskService())->addComment($task, $data, $user)) {
            return $this->item($comment, new ModelTransformer(Group::ALL))->setStatusCode(201);
        }
    }

    /**
     * @param Request $request
     * @param Product $task
     * @param File $attachment
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAttachment(Request $request, Product $task, File $attachment)
    {
        $user = $this->currentUser();
        $myTasks = $task->getMyTasks($request, $task->id)->get();
        if($myTasks->count() === 0) {
            throw new AccessDeniedHttpException("Unauthorized");
        }

        if (!$task->attachments()->getResults()->contains($attachment)) {
            throw new AccessDeniedHttpException(Lang::get('history.attachmentNotBelong'));
        }

        $task->addHistory($user, 'history.deletedAttachment', 'Attachment');
        $attachment->delete();

        return $this->removed(Lang::get('history.deletedAttachment'));
    }

    /**
     * @param Request $request
     * @param Product $task
     * @param Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteComment(Request $request, Product $task, Comment $comment)
    {
        $user = $this->currentUser();

        if ($comment->user()->getResults()->id !== $user->id) {
            throw new AccessDeniedHttpException("This comment not belong to user.");
        }

        $myTasks = $task->getMyTasks($request, $task->id)->get();
        if($myTasks->count() === 0) {
            throw new AccessDeniedHttpException("Unauthorized");
        }

        if (!$task->comments()->getResults()->contains($comment)) {
            throw new ConflictHttpException(Lang::get('history.commentNotBelong'));
        }

        $task->addHistory($user, 'history.deletedComment', 'Comment');
        $comment->delete();

        return $this->removed(Lang::get('history.deletedComment'));
    }

    /**
     * @param Request $request
     * @param Product $task
     * @return \Dingo\Api\Http\Response
     */
    public function getHistories(Request $request, Product $task)
    {
        $myTasks = $task->getMyTasks($request, $task->id)->get();
        if($myTasks->count() === 0) {
            throw new AccessDeniedHttpException("Unauthorized");
        }

        return $this->collection($task->historicals, new ModelTransformer(Group::ALL));
    }

}