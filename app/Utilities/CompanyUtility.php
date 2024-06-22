<?php

namespace App\Utilities;

use App\Models\Company;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CompanyUtility
{

    public static function getCompanyApiUrl($subdomain): string
    {
        return Company::find('subdomain', $subdomain)->pluck('api');
    }

    public static function isCompanyCachedInfo($subdomain): bool
    {
        $cached_company_info = Cache::get('company_info');

        if (!is_null($cached_company_info) && $subdomain == $cached_company_info['company'])
            return true;

        return self::setCompanyCachedInfo($subdomain);
    }

    private static function setCompanyCachedInfo($subdomain): bool
    {

        $company_info['colors'] = self::getCompanyColorTheme($subdomain);

        $company_info['sidebar'] = self::getCompanySidebarMenus($subdomain);

        $company_info['company'] = $subdomain;

        return Cache::forever('company_info', $company_info);

    }

    private static function getCompanyColorTheme($subdomain): array
    {
        return Company::select('primary_color AS primary', 'secondary_color AS secondary')
            ->where('subdomain', $subdomain)
            ->first()
            ->toArray();
    }

    private static function getCompanySidebarMenus($subdomain): array
    {
        // A Single method it needs
        $company_table = Company::where('subdomain', $subdomain)->first();

        $group_id = $company_table['group_id'];

        $query = DB::select("SELECT a.*,
                             b.id AS indicator_group_id, b.title AS indicator_group_title
                             FROM indicators AS a,
                             indicators_group AS b,
                             companies_group AS c,
                             companies_group_indicator AS d
                             WHERE a.indicator_group_id = b.id
                             AND c.id = ?
                             AND c.id = d.company_group_id
                             AND d.indicator_id = a.id
                             ORDER BY a.id
                             ", [$group_id]);

        $menus = [];
        $sidebar = [];

        foreach ($query as $result) {

            if (!isset($sidebar['titles'][$result->indicator_group_title])) {
                $sidebar['titles'][$result->indicator_group_title] = [];
            }

            if (is_null($result->parent_id)) {

                $menus['menus'][$result->id] = [
                    'title' => $result->title,
                    'icon' => $result->icon,
                    'route' => $result->route,
                ];

            } else {

                $submenus = [
                    'title' => $result->title,
                    'icon' => $result->icon,
                    'route' => $result->route
                ];

                if (!isset($menus['menus'][$result->parent_id]['submenus'])) {
                    $menus['menus'][$result->parent_id]['submenus'] = [];
                }

                $menus['menus'][$result->parent_id]['submenus'][] = $submenus;
            }

            $sidebar['titles'][$result->indicator_group_title] = $menus;
        }

        return $sidebar;
    }
}
