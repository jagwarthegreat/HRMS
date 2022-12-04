<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
		"reference",
		"from",
		"to",
		"remarks",
		"status",
		"date",
    ];

	public function location_from()
    {
        return $this->belongsTo(Location::class,'from','id');
    }

	public function location_to()
    {
        return $this->belongsTo(Location::class,'to','id');
    }
}
