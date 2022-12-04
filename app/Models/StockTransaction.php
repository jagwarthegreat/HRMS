<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
    	"location_id",
		"stock_id",
		"header_id",
		"detail_id",
		"module",
		"transaction",
		"quantity",
		"cost",
		"status",
		"date",
    ];

	public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
