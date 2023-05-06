<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obr extends Model
{
    use HasFactory;
    protected $table = 'obrs';
    protected $fillable = [
        'obrStatus',
        'obrDate',
        'obr',
        'obrRemarks',
        'obrNumbers',
        'obrState',
        'document_id',
    ];
}