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
        'pay_rate',
        'reason',
        'comment',
        'trans_date',
    ];

    public function pay_types()
    {
        return $this->belongsTo(PayType::class, 'pay_type_id', 'id');
    }
}
