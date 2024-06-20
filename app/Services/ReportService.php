<?php

namespace App\Services;

use App\Models\Report;

class ReportService
{
    public function getAllReports(): array
    {
        return Report::all()->toArray();
    }
}