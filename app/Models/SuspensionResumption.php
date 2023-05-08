<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuspensionResumption extends Model
{
    use HasFactory;
    protected $table = 'suspensionResumptions';
    protected $fillable = [
        'srStatus',
        'srDate',
        'srNumbers',
        'srReasons',
        'srRemarks',
        'srState',
        'document_id',
    ];
}