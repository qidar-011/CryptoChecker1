<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'features',
        'plan',
        'button_text',
    ];

    
}
