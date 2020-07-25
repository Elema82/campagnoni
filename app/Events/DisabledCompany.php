<?php

namespace App\Events;

use App\Api\V1\Companies\Company;
use App\Api\V1\Users\Model\User;

/**
 * Class DisabledCompnay
 * @package app\Events
 */
class DisabledCompany extends Event
{
    /**
     * @var Company
     */
    private $company;

    /**
     * InviteUserToCompany constructor.
     * @param User $user
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return User
     */
    public function getCompany()
    {
        return $this->company;
    }
}