<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtensionResumption extends Model
{
    use HasFactory;
    protected $table = 'extensionResumptions';
    protected $fillable = [
        'erStatus',
        'erDate',
        'erNumbers',
        'erReasons',
        'erRemarks',
        'erState',
        'document_id',
    ];
}