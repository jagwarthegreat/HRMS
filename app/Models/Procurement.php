<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    use HasFactory;

    protected $fillable = [
		"reference",
		"invoice",
		"supplier",
		"remarks",
		"status",
		"date",
		"location_id"
    ];

}
