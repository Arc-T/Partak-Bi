<?php

namespace App\Services;

use App\Models\Company;


class CompanyService
{

    public static function getCompanyIdBySubdomain(string $subdomain): int
    {

        return Company::where('subdomain', $subdomain)->pluck('id')[0];
    }

}