@extends('website.layouts.app')

@section('title', 'CryptoChecker - Home Page')

@section('main-logo')
    <video autoplay loop muted playsinline class="main-logo">
        <source src="{{ asset('website/assets/videos/24032967.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
@endsection

@section('content')
    <!-- أدوات البحث -->
    <div class="search-tools">
        <div class="search-container">
            <input type="text" class="form-control search-bar" placeholder="Enter Token Address">
            <select class="form-select network-select">
                <option selected>SOL</option>
            </select>
        </div>
        <button class="btn btn-primary">Check</button>
    </div>

    <!-- قسم العملات المدرجة حديثًا -->
    @foreach($newlyListedTokens as $token)
        <div class="coin-info">
            <div class="coin-info-header">
                <img src="{{ $token->logo_url }}" alt="{{ $token->symbol }}">
                <div>
                    {{ $token->name }} ({{ $token->symbol }})<br>
                    Network: {{ $token->network }}<br>
                    Expected Price: ${{ $token->expected_price }}
                </div>
            </div>
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Total Supply:</td>
                        <td>{{ number_format($token->total_supply, 0, '.', ',') }} {{ $token->symbol }}</td>
                    </tr>
                    <tr>
                        <td>Circulating Supply:</td>
                        <td>{{ number_format($token->circulating_supply, 0, '.', ',') }} {{ $token->symbol }}</td>
                    </tr>
                    <tr>
                        <td>Next Supply:</td>
                        <td>{{ number_format($token->next_supply, 0, '.', ',') }} {{ $token->symbol }}</td>
                    </tr>
                    <tr>
                        <td>LP Locked:</td>
                        <td>{{ $token->lp_locked ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Mint:</td>
                        <td>{{ $token->mint ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Freeze:</td>
                        <td>{{ $token->freeze ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>JITO:</td>
                        <td>{{ $token->jito ? 'Active' : 'Inactive' }}</td>
                    </tr>
                    <tr>
                        <td>Team Coins:</td>
                        <td>{{ number_format($token->team_coins, 0, '.', ',') }} {{ $token->symbol }}</td>
                    </tr>
                    <tr>
                        <td>Ads Coins:</td>
                        <td>{{ number_format($token->ads_coins, 0, '.', ',') }} {{ $token->symbol }}</td>
                    </tr>
                    <tr>
                        <td>Security %:</td>
                        <td>{{ $token->security_percentage }}%</td>
                    </tr>
                    <tr>
                        <td>Listing Time:</td>
                        <td>{{ $token->listing_time }}</td>
                    </tr>
                    <tr>
                        <td>DEX Listing:</td>
                        <td>{{ $token->dex_listing ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
@endsection
