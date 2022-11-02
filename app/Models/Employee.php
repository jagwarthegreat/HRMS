<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code',
        'firstname',
        'lastname',
        'contact',
        'address',
        'date_of_birth',
        'date_hired',
        'gender',
        'civil_status',
        'sss_number',
        'tin_number',
        'pagibig_number',
        'employment_status',
        'position'
    ];

    public function position()
    {
        return $this->hasOne(Position::class);
    }
}
