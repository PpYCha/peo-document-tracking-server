<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuspensionOrder extends Model
{
    use HasFactory;
    protected $table = 'suspensionOrders';
    protected $fillable = [
        'soStatus',
        'soDate',
        'soNumbers',
        'soReasons',
        'soRemarks',
        'soState',
        'document_id',
    ];
}