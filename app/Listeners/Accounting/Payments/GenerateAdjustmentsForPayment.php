<?php

namespace App\Listeners\Accounting\Payments;

use App\Api\V1\Accounting\Adjustments\Model\Adjustment;
use App\Api\V1\Accounting\Adjustments\Model\AdjustmentType;
use App\Api\V1\Accounting\Model\Account;
use App\Api\V1\Accounting\Model\Money;
use App\Api\V1\Accounting\Payments\Model\Payment;
use App\Events\Accounting\AccountingEvent;
use App\Events\Accounting\Payments\PaymentReceived;
use Illuminate\Support\Arr;

/**
 * Class GenerateAdjustmentsForPayment
 * @package App\Listeners\Accounting\Payments
 */
class GenerateAdjustmentsForPayment
{
    /**
     * @param PaymentReceived $paymentReceived
     */
    public function handle(PaymentReceived $paymentReceived)
    {
        $payment = $paymentReceived->getPayment();
        $account = $paymentReceived->getAccount();

        foreach ($paymentReceived->getInvoices() as $invoice) {
            $paymentReceived->addAdjustment($payment->generateAdjustment($invoice));
        }

        $remainingMoney = $paymentReceived->getRemainingMoney();

        if ($remainingMoney->greaterThan(Money::create(0))) {
            $paymentReceived->addAdjustment($this->generateRemainingMoneyAdjustment($remainingMoney, $payment, $account));

        }

        event(new AccountingEvent($account, $paymentReceived->getAdjustments(), [$payment], $paymentReceived->getInvoices()));
    }

    /**
     * @param Money $amount
     * @param Payment $payment
     * @param Account $account
     * @return Adjustment
     */
    protected function generateRemainingMoneyAdjustment(Money $amount, Payment $payment, Account $account)
    {
        $adjustment = new Adjustment([
            'adjustment_type_id' => AdjustmentType::getRemainingAdjustmentType($account),
            'amount' => $amount->formatted(),
            'is_credit' => true,
            'description' => 'Credit Note'
        ]);

        $adjustment->setAttribute('account_id', $account->getAttribute('id'));
        $adjustment->setAttribute('created_by', $payment->getAttribute('created_by'));

        $payment->setRelation('creditsAdjustment', $adjustment);

        return $adjustment;
    }
}