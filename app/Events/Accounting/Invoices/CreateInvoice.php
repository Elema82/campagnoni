<?php

namespace App\Events\Accounting\Invoices;

use App\Api\V1\Accounting\Invoices\Model\Invoice;

/**
 * Class CreateInvoice
 * @package App\Events\Accounting\Invoices
 */
class CreateInvoice
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * CreateInvoice constructor.
     * @param Invoice $invoice
     * @param array $data
     */
    public function __construct(Invoice $invoice, array $data)
    {
        $this->invoice = $invoice;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

}