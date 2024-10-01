<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopHolder extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id',
        'rank',
        'holder_name',
        'percentage',
    ];

    // العلاقات
    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
