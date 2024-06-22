<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';

    public function reportGraphs(): HasMany
    {
        return $this->hasMany(ReportGraph::class);
    }
}
