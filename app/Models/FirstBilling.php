<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstBilling extends Model
{
    use HasFactory;
    protected $table = 'firstBillings';
    protected $fillable = [
        'fbStatus',
        'fbDate',
        'fbAmount',
        'fbRemarks',
        'fbState',
        'document_id',
    ];
}