<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'wallet_address',
        'subject',
        'priority',
        'message',
        'attachment_path',
    ];
}
