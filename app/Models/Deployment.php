<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'amount',
        'resgnation_effective_date',
        'deployment_date'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
