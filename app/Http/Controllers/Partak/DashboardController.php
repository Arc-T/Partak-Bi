<?php

namespace App\Http\Controllers\Partak;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $users_table   = User::all();

        $results = DB::select('SELECT a.id AS CID,
                                      a.name AS CName,
                                      a.group_id AS CGID,
                                      c.id AS UID
                                FROM companies AS a
                                LEFT JOIN users AS c ON  a.id = c.company_id
                                ');

        $dataArray = [];

        foreach ($results as $result) {

            $percent = 25;
            $color = 'danger';

            if (!empty($result->CGID)) {
                $percent += 25;
            }
            if (!empty($result->UID)) {
                $percent += 25;
            }

            if ($percent == 50) {
                $color = 'warning';
            } elseif ($percent == 75) {
                $color = 'primary';
            } elseif ($percent == 100) {
                $color = 'success';
            }

            $data = [

                'CID'     => $result->CID,
                'CName'   => $result->CName,
                'CGID'    => $result->CGID,
                'UID'     => $result->UID,
                'percent' => $percent,
                'color'   => $color,

            ];

            $dataArray[] = $data;
        }

        return view('partak.dashboard.home.index')->with([

            'users'              => $users_table,
            'companies'          => $dataArray,
        ]);
    }
}
