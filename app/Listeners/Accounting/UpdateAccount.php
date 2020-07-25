<?php

namespace App\Listeners\Accounting;

use Dingo\Api\Exception\StoreResourceFailedException;
use App\Events\Accounting\UpdateAccount as UpdateAccountEvent;

/**
 * Class UpdateAccount
 * @package App\Accounting\Tasks
 */
class UpdateAccount
{
    /**
     * @param UpdateAccountEvent $event
     */
    public function handle(UpdateAccountEvent $event)
    {
        $account = $event->getAccount();
        $data = $event->getData();

        $account->setRulesUpdate();

        $account->fill($data);

        if ($account->isInvalid()) {
            throw new StoreResourceFailedException("Missing required fields or invalid information.", $account->getErrors());
        }

        $account->save();
    }
}