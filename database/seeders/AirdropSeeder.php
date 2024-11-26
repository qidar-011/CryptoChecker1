<?php

namespace Database\Seeders;

use App\Models\Airdrop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AirdropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
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
                'logo' => 'https://www.coinsqueens.com/blog/wp-content/uploads/2024/07/Signal-Trading-Bot-1.jpg',
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

        foreach ($airdrops as $airdrop) {
            Airdrop::create($airdrop);
        }
    }
}
