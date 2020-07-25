<?php

namespace App\Listeners\Accounting;

use App\Api\V1\Accounting\Payments\Model\PaymentAdjustment;
use App\Events\Accounting\AccountingEvent;
use App\Events\Accounting\Adjustments\AdjustmentAdded;

/**
 * Class UpdateAccountingBalance
 * @package App\Listeners\Accounting\Payments
 */
class UpdateAccountingBalance
{
    /**
     * @param AccountingEvent $event
     */
    public function handle(AccountingEvent $event)
    {
        $account = $event->getAccount();
        $payments = $event->getPayments();
        $adjustments = $event->getAdjustments();
        $invoices = $event->getInvoices();

        foreach ($adjustments as $adjustment) {
            $adjustment->setAttribute('account_id', $account->id);
            event(new AdjustmentAdded($adjustment, $account, false));
        }

        foreach ($invoices as $invoice) {
            unset($invoice->amount_received);
        }

        foreach ($payments as $payment) {
            unset($payment->company_id);
            unset($payment->account_id);
            unset($payment->invoices);
        }

        $account->flush(array_merge($adjustments, $payments, $invoices));
    }
}