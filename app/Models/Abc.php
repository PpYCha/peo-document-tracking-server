<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abc extends Model
{
    use HasFactory;
    protected $table = 'abcs';
    protected $fillable = [
        'abcStatus',
        'abcDate',
        'abc',
        'abcRemarks',
        'abcState',
        'document_id',
    ];

}