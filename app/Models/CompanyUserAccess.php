<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyUserAccess extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'cp_accesses';
}
