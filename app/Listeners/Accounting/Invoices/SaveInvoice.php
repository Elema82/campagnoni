<?php

namespace App\Listeners\Accounting\Invoices;

use App\Api\V1\Accounting\Invoices\Model\Invoice;
use App\api\V1\Accounting\Invoices\Model\InvoiceStatus;
use App\Api\V1\Accounting\Model\Account;
use App\Events\Accounting\Invoices\CreateInvoice;
use App\Jobs\NewInvoice;
use Dingo\Api\Exception\StoreResourceFailedException;

/**
 * Class SaveInvoice
 * @package App\Listeners\Accounting\Invoices
 */
class SaveInvoice
{
    /**
     * @param CreateInvoice $event
     */
    public function handle(CreateInvoice $event)
    {
        $invoice = $event->getInvoice();
        $data = $event->getData();

        $invoice->fill($data);

        $adjustments = $invoice->createAdjustmentsCollection();
        $invoice->setTotals($adjustments);

        $invoice->setStatus(InvoiceStatus::OPEN);

        if (!$invoice->isValid()) {
            throw new StoreResourceFailedException("Missing required fields or invalid information.",$invoice->getErrors());
        }

        if($data['due_date'] < date('Y-m-d'))
            $invoice->setStatus(InvoiceStatus::DUE);

        unset($invoice->company_id);
        unset($invoice->adjustments);

        $invoice->token = Invoice::generateToken();

        $invoice->flush($adjustments, 'invoice_id');

        if ($invoice->isSaved()) {
            /** @var Account $account */
            $account = $invoice->account()->getResults();
            $emailInvoice = array_key_exists('emailInvoice', $data) ? $data['emailInvoice'] : $account->notificationOnInvoiced();

            if ($account->notificationOnInvoiced()) {
                $account->setBillingDates();
                $account->save();

                if ($emailInvoice) {
                    dispatch(new NewInvoice($invoice, $account));
                }
            }
        }
    }
}