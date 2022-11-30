<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "stock_id",
        "quantity",
        "cost",
        "amount",
    ];
}
