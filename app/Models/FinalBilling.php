<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalBilling extends Model
{
    use HasFactory;
    protected $table = 'finalBillings';
    protected $fillable = [
        'finalBilling_Status',
        'finalBilling_Date',
        'finalBilling_Amount',
        'finalBilling_Remarks',
        'finalBilling_State',
        'document_id',
    ];
}