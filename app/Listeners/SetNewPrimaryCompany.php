<?php

namespace App\Listeners;

use App\Events\DisabledCompany;
use App\Api\V1\Companies\CompanyPrimary;

/**
 * Class RequestChangeUserPassword
 * @package App\Listeners
 */
class SetNewPrimaryCompany
{
    /**
     * @param DisabledCompany $event
     */
    public function handle(DisabledCompany $event)
    {
        $company = $event->getCompany();

        $companyPrimary = new CompanyPrimary();
        $companyPrimary->checkUsers($company);
    }
}