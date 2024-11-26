<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirdropsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // بيانات مؤقتة للأيردروبات
        $airdrops = [
            [
                'name' => 'Serum (SRM)',
                'logo' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/8526.png',
                'amount' => '500 SRM',
                'requirements' => 'Hold 100 SRM in wallet',
                'end_date' => '2024-09-30',
            ],
            [
                'name' => 'Raydium (RAY)',
                'logo' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/7978.png',
                'amount' => '200 RAY',
                'requirements' => 'Trade 5 times on Raydium DEX',
                'end_date' => '2024-10-15',
            ],
            [
                'name' => 'Bonfida (FIDA)',
                'logo' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/3151.png',
                'amount' => '300 FIDA',
                'requirements' => 'Join Bonfida staking pool',
                'end_date' => '2024-11-01',
            ],
            [
                'name' => 'Solanium (SLIM)',
                'logo' => 'https://www.solanium.io/imgs/solanium-logo.png',
                'amount' => '100 SLIM',
                'requirements' => 'Stake 50 SLIM tokens',
                'end_date' => '2024-11-15',
            ],
            [
                'name' => 'Solana (SOL)',
                'logo' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/4128.png',
                'amount' => '150 SOL',
                'requirements' => 'Delegate SOL to a validator',
                'end_date' => '2024-12-01',
            ],
        ];

        return view('website.airdrops.index', compact('airdrops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
