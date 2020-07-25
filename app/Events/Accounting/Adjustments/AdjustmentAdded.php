<?php

namespace App\Events\Accounting\Adjustments;

use App\Api\V1\Accounting\Adjustments\Model\Adjustment;
use App\Api\V1\Accounting\Model\Account;

/**
 * Class AddAdjustment
 * @package App\Events\Accounting\Adjustments
 */
class AdjustmentAdded
{
    /**
     * @var Adjustment
     */
    private $adjustment;

    /**
     * @var Account
     */
    private $account;

    /**
     * @var boolean
     */
    private $isAlone;

    /**
     * AdjustmentAdded constructor.
     * @param Adjustment $adjustment
     * @param Account|null $account
     * @param bool $isAlone
     */
    public function __construct(Adjustment $adjustment, Account $account = null, $isAlone = true)
    {
        $this->adjustment = $adjustment;
        $this->account = $account;
        $this->isAlone = $isAlone;
    }

    /**
     * @return Adjustment
     */
    public function getAdjustment()
    {
        return $this->adjustment;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return bool
     */
    public function isAlone()
    {
        return $this->isAlone;
    }

}