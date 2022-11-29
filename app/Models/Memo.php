<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'from',
        'subject',
        'content',
        'memo_date'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
