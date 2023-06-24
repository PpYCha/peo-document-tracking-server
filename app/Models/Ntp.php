<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ntp extends Model
{
    use HasFactory;
    protected $table = 'ntps';
    protected $fillable = [
        'ntp',
        'ntpDate',
        'ntpProjectEngineer',
        'ntpContractor',
        'ntpContractAmount',
        'ntpContractDuration',
        'ntpRevisedContactAmount',
        'ntpRevisedContractDuration',
        'document_id',
    ];
}