<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eze_jobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'candidate_id',
        'job_title',
        'company_name',        
    ];

    public function eze_candidates()
    {
        return $this->belongsTo(eze_candidates::class);
    }
}
