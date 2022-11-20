<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpJobHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'location_id',
        'department_id',
        'position_id',
        'trans_date'
    ];

    public function locations()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function positions()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
