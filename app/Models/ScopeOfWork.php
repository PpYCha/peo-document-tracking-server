<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScopeOfWork extends Model
{
    use HasFactory;
    protected $table = 'scopeOfWorks';
    protected $fillable = [
        'sowStatus',
        'sowDate',
        'sow',
        'sowRemarks',
        'sowState',
        'document_id',
    ];
}