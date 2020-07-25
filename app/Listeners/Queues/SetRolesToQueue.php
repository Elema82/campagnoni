<?php

namespace App\Listeners\Queues;

use App\Api\V1\Queues\Model\QueueRole;
use App\Api\V1\Roles\Role;
use App\Events\Queues\AddRoleToQueue;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

/**
 * Class SetRole
 * @package App\Listeners\SetRolesToQueue
 */
class SetRolesToQueue
{
    /**
     * @param AddRoleToQueue $event
     */
    public function handle(AddRoleToQueue $event)
    {
        $queue = $event->getQueue();
        $request = $event->getRequest();
        $roles = $request->get('roles', null);

        if (!is_array($roles)) {
            throw new StoreResourceFailedException('Missing required fields or invalid information.', new MessageBag(['roles' => Lang::get('queue.rolesEmptyError')]));
        }

        foreach ($roles as $role) {
            $queueRole = new QueueRole(compact('role'));

            if (!$queueRole->isValid()) {
                throw new StoreResourceFailedException('Missing required fields or invalid information.', $queueRole->getErrors());
            }

            $roleModel = Role::where('company_id', '=', $request->get('company')->id)->find($role);
            if (!$roleModel) {
                throw new ConflictHttpException(Lang::get('roles.companyError'));
            }
        }

        $queue->roles()->sync($roles);
    }
}