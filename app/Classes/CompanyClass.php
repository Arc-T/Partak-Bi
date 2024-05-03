<?php

namespace App\Classes;

use App\Models\Company;
use App\Models\IndicatorGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CompanyClass
{

    public static function get_company_view_details($subdomain)
    {
        return self::getCachedCompanyDetails($subdomain);
    }

    public static function get_company_details($subdomain)
    {

        $company_table = Company::where('Subdomain', $subdomain)->first();

        return $company_table;
    }

    /**
     * This method will cache and return company color theme & sidebar icons and accesses.
     * should be called in every function of company controller
     * @return array
     */
    private static function getCachedCompanyDetails($subdomain)
    {
        return Cache::remember('common', 60, function () use ($subdomain) {

            $menu_titles = IndicatorGroup::all();

            $company_table = Company::where('subdomain', $subdomain)->first();

            $group_id = $company_table['group_id'];

            $sidebar = DB::select('SELECT a.id, a.name, b.id AS IGID, b.name AS IGName
            FROM indicators AS a,
                 indicators_group AS b,
                 companies_group_indicator AS c
            WHERE c.company_group_id = ?
            AND   c.indicator_id = a.id
            AND   a.indicator_group_id = b.id', [$group_id]);

            $color = Company::select('primary_color AS primary', 'secondary_color AS secondary')
                ->where('id', $company_table['id'])
                ->first()
                ->toArray();

            return [
                'colors' => $color,
                'sidebar' => $sidebar,
                'titles' => $menu_titles,
            ];
        });
    }
}
