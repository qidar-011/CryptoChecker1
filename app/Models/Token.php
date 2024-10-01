<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'address',
        'network',
        'expected_price',
        'growth_percentage',
        'total_supply',
        'circulating_supply',
        'max_supply',
        'market_cap',
        'liquidity',
        'lp_locked',
        'next_supply',
        'team_coins',
        'ads_coins',
        'security_percentage',
        'listing_time',
        'dex_listing',
        'mint',
        'freeze',
        'jito',
    ];

    // العلاقات
    public function topHolders()
    {
        return $this->hasMany(TopHolder::class);
    }

    public function auditResult()
    {
        return $this->hasOne(AuditResult::class);
    }

    public function coinRating()
    {
        return $this->hasOne(CoinRating::class);
    }

    public function airdrops()
    {
        return $this->hasMany(Airdrop::class);
    }

    public function tBots()
    {
        return $this->hasMany(TBot::class);
    }

    public function analysisResults()
    {
        return $this->hasMany(AnalysisResult::class);
    }
}
