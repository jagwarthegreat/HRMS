<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawsuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'case',
        'content',
        'complainant',
        'respondent',
        'case_date',
        'status'
    ];
}
