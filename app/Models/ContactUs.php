<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';


     /**
     * الحقول القابلة للتعبئة.
     */
    protected $fillable = [
        'name',
        'email',
        'wallet',
        'subject',
        'consultation_type',
        'message',
    ];

}

