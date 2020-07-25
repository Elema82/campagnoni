<?php

namespace App\Events\Accounting\Payments;

use App\Api\V1\Accounting\Adjustments\Model\Adjustment;
use App\Api\V1\Accounting\Invoices\Model\Invoice;
use App\Api\V1\Accounting\Model\Account;
use App\Api\V1\Accounting\Model\Money;
use App\Api\V1\Accounting\Payments\Model\Payment;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class PaymentReceived
 * @package App\Events\Accounting\Payments
 */
class PaymentReceived
{
    /**
     * @var Payment
     */
    private $payment;

    /**
     * @var Account
     */
    private $account;

    /**
     * @var Invoice[]
     */
    private $invoices = [];

    /**
     * @var Adjustment[]
     */
    private $adjustments = [];

    /**
     * @var array
     */
    private $creditAdjustments = [];

    /**
     * @var Money
     */
    private $remainingMoney;

    /**
     * PaymentReceived constructor.
     * @param Payment $payment
     * @param Account $account
     */
    public function __construct(Payment $payment, Account $account)
    {
        $this->payment = $payment;
        $this->account = $account;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return Invoice[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @return Adjustment[]
     */
    public function getAdjustments()
    {
        return $this->adjustments;
    }

    /**
     * @return Adjustment[]
     */
    public function getCreditAdjustments()
    {
        return $this->creditAdjustments;
    }

    /**
     * @return Money
     */
    public function getRemainingMoney()
    {
        return $this->remainingMoney;
    }

    /**
     * @param Money $remainingMoney
     */
    public function setRemainingMoney($remainingMoney)
    {
        $this->remainingMoney = $remainingMoney;
    }

    /**
     * @param Invoice $invoice
     */
    public function addProcessedInvoices(Invoice $invoice)
    {
        if ($invoice->isInvalid()) {
            throw new StoreResourceFailedException('Missing required fields or invalid information..', $invoice->getErrors());
        }

        $this->invoices[] = $invoice;
    }

    /**
     * @param Adjustment $adjustment
     */
    public function addAdjustment(Adjustment $adjustment)
    {
        if ($adjustment->isInvalid()) {
            throw new StoreResourceFailedException('Missing required fields or invalid information..', $adjustment->getErrors());
        }

        $this->adjustments[] = $adjustment;
    }
}