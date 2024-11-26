<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TBotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // بيانات مؤقتة لبوتات التليجرام
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

        return view('website.tBot.index', compact('bots'));
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
