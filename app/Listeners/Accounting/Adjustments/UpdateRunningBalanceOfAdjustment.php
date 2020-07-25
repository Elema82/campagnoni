<?php

namespace App\Listeners\Accounting\Adjustments;

use App\Api\V1\Accounting\Model\Account;
use App\Events\Accounting\Adjustments\AdjustmentAdded;

/**
 * Class UpdateRunningBalance
 * @package App\Listeners\Accounting\Adjustments
 */
class UpdateRunningBalanceOfAdjustment
{
    /**
     * @param AdjustmentAdded $adjustmentAddedEvent
     */
    public function handle(AdjustmentAdded $adjustmentAddedEvent)
    {
        $adjustment = $adjustmentAddedEvent->getAdjustment();
        /** @var Account $account */
        $account = $adjustmentAddedEvent->isAlone()
            ? $adjustment->account()->getResults()
            : $adjustmentAddedEvent->getAccount();

        if (!$adjustment->getAttribute('is_debit')) {
            $adjustment->setAttribute('credit_amount', $adjustment->amount);
            $adjustment->debit_amount = 0;
        } else {
            $adjustment->setAttribute('debit_amount', $adjustment->amount);
            $adjustment->credit_amount = 0;
        }

        $adjustment->runningBalance($account);
        $account->updateActiveBalance($adjustment);

        unset($adjustment->amount);
        unset($adjustment->is_credit);
        unset($adjustment->is_debit);

        if ($adjustmentAddedEvent->isAlone()) {
            $adjustment->flush([$account]);
        }
    }
}