<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'client_id',
        'category_id',
        'filename',
        'filetype',
        'filesize',
        'slug',
        'created_by',
    ];

    public function document_category()
    {
        return $this->belongsTo(DocumentCategory::class, 'category_id', 'id');
    }

    public function created_by()
    {
        return $this->belongsTo(Employee::class, 'created_by', 'id');
    }
}
