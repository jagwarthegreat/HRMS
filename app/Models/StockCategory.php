<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCategory extends Model
{
    use HasFactory;

	protected $fillable = [
        "name",
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class)->latest();
    }
}
