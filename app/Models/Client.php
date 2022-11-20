<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "contact",
        "email",
        "address",
    ];

    public function documents()
    {
        return $this->hasMany(Document::class)->latest();
    }

    public function locations()
    {
        return $this->hasMany(Location::class)->latest();
    }
}
