<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDatabase extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'companies_database';
}
