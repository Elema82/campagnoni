<?php

namespace App\Listeners\Queues;

use App\Api\V1\Queues\Model\QueueUser;
use App\Api\V1\Users\Model\UserCompany;
use App\Events\Queues\AddUserToQueue;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class SetUsersToQueue
 * @package App\Listeners\Queues
 */
class SetUsersToQueue
{
    /**
     * @param AddUserToQueue $event
     */
    public function handle(AddUserToQueue $event)
    {
        $queue = $event->getQueue();
        $request = $event->getRequest();
        $users = $request->get('users', null);

        if (!is_array($users)) {
            throw new StoreResourceFailedException('Missing required fields or invalid information.', new MessageBag(['users' => Lang::get('queue.usersEmptyError')]));
        }

        foreach ($users as $user) {
            $queueUser = new QueueUser(compact('user'));
            if (!$queueUser->isValid()) {
                throw new StoreResourceFailedException('Missing required fields or invalid information.', $queueUser->getErrors());
            }

            $userModel = UserCompany::where('company_id', '=', $request->get('company')->id)->where('user_id', '=', $user)->first();
            if (!$userModel) {
                throw new ConflictHttpException(Lang::get('users.companyNotFound'));
            }
        }

        $queue->users()->sync($users);
    }
}