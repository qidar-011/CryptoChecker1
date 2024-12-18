<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airdrop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'amount',
        'requirements',
        'end_date',
    ];

    
}
