<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpTypeHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'employee_type_id',
        'comment',
        'trans_date',
    ];
}
