<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherDocument extends Model
{
    use HasFactory;
    protected $table = 'otherDocuments';
    protected $fillable = [
        'odStatus',
        'odDate',
        'odDocumentType',
        'odRemarks',
        'odState',
        'document_id',
    ];
}