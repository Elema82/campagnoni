<?php

namespace App\Listeners\Accounting\Payments;

use App\Api\V1\Accounting\Invoices\Model\Invoice;
use App\Api\V1\Accounting\Model\Money;
use App\Events\Accounting\Payments\PaymentReceived;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Support\Arr;

/**
 * Class ProcessPayment
 * @package App\Listeners\Accounting\Payments
 */
class ProcessPayment
{
    /**
     * @param PaymentReceived $paymentReceived
     */
    public function handle(PaymentReceived $paymentReceived)
    {
        $payment = $paymentReceived->getPayment();
        $amountPaid = Money::create($payment->getAttribute('amount'));

        foreach ($payment->getAttribute('invoices') as $invoicesSent) {
            $amountByInvoice = Money::create(Arr::get($invoicesSent, 'amount'));

            $invoice = $this->processInvoice($invoicesSent, $amountByInvoice);

            if ($invoice->isPaid()) break;

            $totalRemainingOfInvoice = Money::create($invoice->getAttribute('total_remaining'));

            if ($totalRemainingOfInvoice->isNegative()) {
                $amountPaid = $amountPaid->add($totalRemainingOfInvoice->multiply(-1));
                $invoice->unsetRule('total_remaining');
            }

            $paymentReceived->addProcessedInvoices($invoice);
            $amountPaid = $amountPaid->subtract($amountByInvoice);
        }

        if ($amountPaid->lessThan(Money::create(0))) {
            throw new StoreResourceFailedException('Missing required fields or invalid information..', ['amount' => 'Payment amount must be enough to pay the selected invoices at least.']);
        }

        $paymentReceived->setRemainingMoney($amountPaid);
    }

    /**
     * @param array $invoice
     * @param Money $amount
     * @return Invoice
     */
    protected function processInvoice(array $invoice, Money $amount)
    {
        /** @var Invoice $invoiceModel */
        $invoiceModel = Invoice::where('id', '=', Arr::get($invoice, 'id'))->firstOrFail();

        $invoiceModel->setAttribute('amount_received', $amount);
        $invoiceModel->addPaymentAmount($amount);

        $invoiceModel->unsetRule('company_id');
        $invoiceModel->unsetRule('adjustments');
        $invoiceModel->unsetRule('due_date');
        $invoiceModel->unsetRule('total_debits');
        $invoiceModel->unsetRule('total_credits');

        return $invoiceModel;
    }
}