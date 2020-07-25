<?php

namespace App\Listeners\Accounting\Payments;

use App\Api\V1\Accounting\Model\Money;
use App\Events\Accounting\Payments\PaymentReceived;
use Illuminate\Support\Arr;

/**
 * Class PreProcessPayments
 * @package App\Listeners\Accounting\Payments
 */
class PreProcessPayments
{
    /**
     * @var array
     */
    protected $processedInvoices = [];

    /**
     * @param PaymentReceived $paymentReceived
     */
    public function handle(PaymentReceived $paymentReceived)
    {
        $payment = $paymentReceived->getPayment();

        foreach ($payment->getAttribute('invoices') as $key => $itemInvoice) {
            if ($this->checkDuplicates($itemInvoice)) {
                $this->setValue($itemInvoice);
            } else {
                $this->processedInvoices[] = $itemInvoice;
            }
        }

        $payment->setAttribute('invoices', $this->processedInvoices);
    }

    /**
     * @param array $newItemInvoice
     * @return bool
     */
    private function checkDuplicates($newItemInvoice)
    {
        foreach ($this->processedInvoices as $invoice) {
            if (Arr::get($invoice, 'id') == Arr::get($newItemInvoice, 'id')) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $newItemInvoice
     */
    private function setValue($newItemInvoice)
    {
        $id = Arr::get($newItemInvoice, 'id');
        $amount = Money::create(Arr::get($newItemInvoice, 'amount'));

        foreach ($this->processedInvoices as $key => $processedInvoice) {
            if (Arr::get($processedInvoice, 'id') == $id) {
                $currentAmount = Money::create(Arr::get($processedInvoice, 'amount'));

                Arr::set($this->processedInvoices[$key], 'amount', $amount->add($currentAmount)->formatted());
            }
        }
    }
}