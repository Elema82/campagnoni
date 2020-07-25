<?php

namespace App\Listeners\Accounting;

use App\Events\Accounting\CreateAccount;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class SaveAccount
 * @package App\Listeners
 */
class SaveAccount
{
    /**
     * @param CreateAccount $event
     */
    public function handle(CreateAccount $event)
    {
        $account = $event->getAccount();
        $data = $event->getData();

        $account->setBalances();
        $account->invoicing = (key_exists('invoicing',$data)? $data['invoicing'] : null);
        $account->bill_on_days = (key_exists('bill_on_days',$data)? $data['bill_on_days'] : null);
        $account->setBillingDates();

        $account->fill($data);
        if (!$account->isValid()) {
            throw new StoreResourceFailedException("Missing required fields or invalid information.",$account->getErrors());
        }

        if(!$account->getOtherAccount($account->issuer_company_id, $account->holder_company_id))
            $account->is_primary = true;
        else{
            $account->is_primary = false;
        }

        $account->save();
    }
}