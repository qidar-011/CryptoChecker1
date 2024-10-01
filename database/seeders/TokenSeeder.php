<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Token::create([
            'name' => 'Serum',
            'symbol' => 'SRM',
            'address' => 'Your_Token_Address_Here',
            'network' => 'Solana',
            // 'description' => 'Serum is a decentralized exchange (DEX) platform built on Solana.'
        ]);

                // أضف المزيد من العملات إذا رغبت
    }
}
