<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEmployment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'company_name',
        'position',
        'from',
        'to',
    ];
}
