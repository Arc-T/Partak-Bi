<?php

namespace App\Http\Utilities;

use App\Models\Company;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CompanyUtility
{

    public static function isCompanyCachedInfo($subdomain): bool
    {
        $cached_company_info = Cache::get('company_info');

        if (!is_null($cached_company_info) && $subdomain == $cached_company_info['company']) return true;

        return self::setCompanyCachedInfo($subdomain);

    }

    public static function setCompanyCachedInfo($subdomain):bool{

        $company_info['colors'] = self::getCompanyColorTheme($subdomain);

        $company_info['sidebar'] = self::getCompanySidebarMenus($subdomain);

        $company_info['company'] = $subdomain;

        return Cache::forever('company_info', $company_info);

    }

    public static function getCompanyColorTheme($subdomain): array
    {
        return Company::select('primary_color AS primary', 'secondary_color AS secondary')
            ->where('subdomain', $subdomain)
            ->first()
            ->toArray();
    }

    private static function getCompanySidebarMenus($subdomain): array
    {
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

        return $sidebar;
    }
}
