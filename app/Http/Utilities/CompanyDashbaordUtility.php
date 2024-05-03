<?php

namespace App\Http\Utilities;

use App\Models\Company;
use App\Models\IndicatorGroup;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DatabaseUtility{


    /**
        * This method will cache and return company color theme & sidebar icons and accesses.
        * should be called in every function of company controller
        * @return array
    */
    private static function getCachedCompanyDetails($subdomain)
    {
        return Cache::remember('common', 60, function () use ($subdomain) {
            $menuTitles = IndicatorGroup::all();

            $companyTable = Company::where('Subdomain', $subdomain)->first();
            $groupId = $companyTable['GroupID'];

            $sidebar = DB::select('SELECT a.Name AS IName, a.IndicatorGroupID, c.Route, c.Icon
                FROM indicator AS a
                JOIN company_group_access AS b ON b.IndicatorID = a.ID
                JOIN menu_detail AS c ON a.ID = c.IndicatorID
                WHERE b.GroupID = ?', [$groupId]);

            $color = Company::select('ColorTheme', 'ColorBackground')
                ->where('ID', $companyTable['ID'])
                ->first()
                ->toArray();

            return [
                'color' => $color,
                'sidebar' => $sidebar,
                'titles' => $menuTitles,
            ];
        });
    }


}
