<?php

namespace App\Classes;

use App\Models\Company;
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

            $company_table = Company::where('subdomain', $subdomain)->first();

            $group_id = $company_table['group_id'];

            $query = DB::select('SELECT a.id, a.name, a.indicator_group_id,
                                        b.id AS IGID, b.name AS IGName,
                                        d.id AS MID,d.route,d.icon,d.indicator_id
                                 FROM indicators AS a, 
                                      indicators_group AS b,
                                      companies_group_indicator AS c,
                                      menus AS d
                                 WHERE a.indicator_group_id = b.id
                                 AND a.id = d.indicator_id
                                 AND c.indicator_id = a.id
                                 AND c.company_group_id = ?', [$group_id]);

            $sidebar = [];

            foreach ($query as $result) {

                if (in_array($result->IGName, array_column($sidebar, 'title'))) continue;

                $indicators = [];
                foreach ($query as $result_indicators) {
                    if ($result_indicators->IGID == $result->IGID) {
                        $indicators[] = [
                            'name' => $result_indicators->name,
                            'route' => $result_indicators->route,
                            'icon' => $result_indicators->icon
                        ];
                    }
                }
                $sidebar[] = [
                    'title' => $result->IGName,
                    'indicators' => $indicators,
                ];
            }

            $color = Company::select('primary_color AS primary', 'secondary_color AS secondary')
                ->where('id', $company_table['id'])
                ->first()
                ->toArray();

            return [
                'colors' => $color,
                'sidebar' => $sidebar,
            ];
        });
    }
}
