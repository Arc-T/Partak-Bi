<?php

namespace App\Http\Controllers;

use App\Exports\ExportUsers;
use Maatwebsite\Excel\Facades\Excel;

class testController extends Controller
{
    public function index()
    {
       return view('index');
    }

    public function export()
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }
}
