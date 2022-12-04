<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'requirement_id',
        'employee_id'
    ];
}
