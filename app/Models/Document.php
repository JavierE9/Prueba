<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'relevance',
        'approval_date',
        'upload_date',
        'pdf_path',
        'created_at',

    ];
}
