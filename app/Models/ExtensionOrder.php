<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtensionOrder extends Model
{
    use HasFactory;
    protected $table = 'extensionOrders';
    protected $fillable = [
        'eoStatus',
        'eoDate',
        'eoNumbers',
        'eoReasons',
        'eoRemarks',
        'eoState',
        'document_id',
    ];
}