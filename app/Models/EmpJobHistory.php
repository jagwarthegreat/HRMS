<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpJobHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'location_id',
        'department_id',
        'position_id',
        'reports_to',
        'trans_date'
    ];
}
