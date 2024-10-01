<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id',
        'community_rating',
        'liquidity_rating',
        'project_quality_rating',
    ];

    // العلاقات
    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
