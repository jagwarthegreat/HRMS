<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaOfAccess extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "coordinates",
        "radius",
        "status"
    ];
}