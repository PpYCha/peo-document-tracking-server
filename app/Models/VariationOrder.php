<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOrder extends Model
{
    use HasFactory;
    protected $table = 'variationOrders';
    protected $fillable = [
        'voStatus',
        'voDate',
        'voNumbers',
        'voReasons',
        'voRemarks',
        'voScope',
        'voState',
        'document_id',
    ];
}