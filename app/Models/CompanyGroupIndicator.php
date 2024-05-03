<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGroupIndicator extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'companies_group_indicator';
}
