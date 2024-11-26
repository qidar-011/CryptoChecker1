<?php

namespace Database\Seeders;

use App\Models\TBot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TBotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $bots = [
            [
                'name' => 'AI Bot',
                'image' => 'https://coinpush.app/wp-content/uploads/2024/08/ai_trading_bots.jpeg',
                'features' => 'AI-powered alerts for token prices and trends',
                'plan' => 'Free',
                'button_text' => 'Join Now',
            ],
            [
                'name' => 'Trading Signals Bot',
                'image' => 'https://www.coinsqueens.com/blog/wp-content/uploads/2024/07/Signal-Trading-Bot-1.jpg',
                'features' => 'Advanced trading signals based on market data',
                'plan' => 'Premium - $19.99/month',
                'button_text' => 'Subscribe',
            ],
            [
                'name' => 'Crypto Alerts Bot',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwhF-Ve7GM3UC1gKKjBmURgGntIkk_rGnQDA&s',
                'features' => 'Real-time alerts on token prices and market trends',
                'plan' => 'Free',
                'button_text' => 'Join Now',
            ],
            [
                'name' => 'Portfolio Tracker Bot',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtdlbatYtqwWsTWbzFDxfFb1eGDsjpbJPI-Q&s',
                'features' => 'Track your crypto portfolio with live updates',
                'plan' => 'Premium - $9.99/month',
                'button_text' => 'Subscribe',
            ],
        ];

        foreach ($bots as $bot) {
            TBot::create($bot);
        }
    }
}
