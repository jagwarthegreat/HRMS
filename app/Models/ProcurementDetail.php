<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        "procurement_id",
        "stock_id",
        "quantity",
        "cost",
        "amount",
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
