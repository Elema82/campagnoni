<?php

namespace App\Events\Accounting;

use App\Api\V1\Accounting\Model\Account;
use App\Events\Event;

/**
 * Class UpdateAccount
 * @package app\Events
 */
class UpdateAccount extends Event
{

    /**
     * @var array
     */
    private $data;

    /**
     * @var Account
     */
    private $account;

    /**
     * UpdateAccount constructor.
     * @param Account $account
     * @param array $data
     */
    public function __construct(Account $account, array $data)
    {
        $this->account = $account;
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
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}