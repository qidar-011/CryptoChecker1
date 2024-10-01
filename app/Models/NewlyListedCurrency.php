<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewlyListedCurrency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'address',
        'network',
        'expected_price',
        'total_supply',
        'circulating_supply',
        'next_supply',
        'lp_locked',
        'mint',
        'freeze',
        'jito',
        'team_coins',
        'ads_coins',
        'security_percentage',
        'listing_time',
        'dex_listing',
        'logo_url'
    ];

    /* protected $fillable = [
        'name',
        'symbol',
        'network',
        'expected_price',
        'growth_percentage',
        'total_supply',
        'circulating_supply',
        'next_supply',
        'lp_locked',
        'mint',
        'freeze',
        'jito',
        'team_coins',
        'ads_coins',
        'security_percentage',
        'listing_time',
        'dex_listing',
    ]; */
}
