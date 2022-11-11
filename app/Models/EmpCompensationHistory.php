<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpCompensationHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'pay_type_id',
        'reason',
        'comment',
        'trans_date',
    ];
}
