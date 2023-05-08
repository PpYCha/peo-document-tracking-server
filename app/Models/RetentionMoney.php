<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetentionMoney extends Model
{
    use HasFactory;
    protected $table = 'rententionMoneys';
    protected $fillable = [
        'rmStatus',
        'rmDate',
        'rmAmount',
        'rmRemarks',
        'rmState',
        'document_id',
    ];
}