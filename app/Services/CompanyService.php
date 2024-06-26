<?php

namespace App\Services;

use App\Models\Company;

class CompanyService
{
    public static function getCompanyIdBySubdomain(string $subdomain): int
    {

        return Company::where('subdomain', $subdomain)->pluck('id')[0];
    }
    public static function getCompanyApiBySubdomain(string $subdomain): string
    {
        return Company::where('subdomain', $subdomain)->pluck('api');
    }

}