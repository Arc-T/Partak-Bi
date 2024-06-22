<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportGraph extends Model
{
    use HasFactory;
    protected $table = 'reports_graph';

    public function graph(): BelongsTo
    {
        return $this->belongsTo(Graph::class);
    }
}
