<?php

namespace App\Events\Accounting;

use App\Api\V1\Accounting\Adjustments\Model\Adjustment;
use App\Api\V1\Accounting\Invoices\Model\Invoice;
use App\Api\V1\Accounting\Model\Account;
use App\Api\V1\Accounting\Payments\Model\Payment;

/**
 * Class AccountingEvent
 * @package App\Events\Accounting
 */
class AccountingEvent
{
    /**
     * @var Account
     */
    private $account;

    /**
     * @var Adjustment[]
     */
    private $adjustments;

    /**
     * @var Payment[]
     */
    private $payments;

    /**
     * @var Invoice[]
     */
    private $invoices;

    /**
     * AccountingEvent constructor.
     * @param Account $account
     * @param Adjustment[] $adjustments
     * @param Payment[] $payments
     * @param Invoice[] $invoices
     */
    public function __construct(Account $account, array $adjustments, array $payments, array $invoices)
    {
        $this->account = $account;
        $this->adjustments = $adjustments;
        $this->payments = $payments;
        $this->invoices = $invoices;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return Adjustment[]
     */
    public function getAdjustments()
    {
        return $this->adjustments;
    }

    /**
     * @return Payment[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @return Invoice[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }
}