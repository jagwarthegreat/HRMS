<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpStatusHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'employee_status_id',
        'comment',
        'trans_date',
    ];
}
