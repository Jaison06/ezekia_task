<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eze_candidates extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',            
    ];
}
