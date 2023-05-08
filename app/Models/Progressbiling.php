<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progressbiling extends Model
{
    use HasFactory;
    protected $table = 'progessBillings';
    protected $fillable = [
        'pgStatus',
        'pgDate',
        'pgNumbers',
        'pgAmount',
        'pgRemarks',
        'pgState',
        'document_id',
    ];
}