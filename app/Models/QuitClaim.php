<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuitClaim extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'amount',
        'resgnation_effective_date',
        'claims_effective_date'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
