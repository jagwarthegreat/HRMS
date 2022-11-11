<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeEducationalBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'schoolName',
        'degree',
        'field',
        'year'
    ];
}
