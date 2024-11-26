@extends('website.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- أدوات البحث -->
    <form action="{{ route('website.checkToken') }}" method="POST">
        @csrf
        <div class="search-tools">
            <div class="search-container">
                <input type="text" name="token_address" class="form-control search-bar" placeholder="Enter Token Address" required>
                <select name="network" class="form-select network-select">
                    <option value="SOL" selected>SOL</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </div>
    </form>
     <!-- عرض رسائل الخطأ -->
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $errors->first() }}
        </div>
    @endif
    
    <!-- قسم العملات المدرجة حديثًا -->
    @include('website.home.newlyListedCurrencies.index')
@endsection






{{-- @extends('website.layouts.app')

@section('title', 'CryptoChecker - Home Page')

@section('main-logo')
    <video autoplay loop muted playsinline class="main-logo">
        <source src="{{ asset('website/assets/videos/24032967.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
@endsection

@extends('website.layouts.app')

@section('content')
    <div class="container">
        <h2>Recently Listed Currencies</h2>
        @foreach ($newlyListedCurrencies as $currency)
            <div class="coin-info">
                <div class="coin-info-header">
                    <img src="{{ $currency->logo_url }}" alt="{{ $currency->symbol }}">
                    <div>
                        {{ $currency->name }} ({{ $currency->symbol }})<br>
                        Network: {{ $currency->network }}<br>
                        Expected Price: ${{ $currency->expected_price }}
                    </div>
                </div>
                <table class="coin-table">
                    <tbody>
                        <tr><td>Total Supply:</td><td>{{ $currency->total_supply }}</td></tr>
                        <tr><td>Circulating Supply:</td><td>{{ $currency->circulating_supply }}</td></tr>
                        <tr><td>Next Supply:</td><td>{{ $currency->next_supply }}</td></tr>
                        <tr><td>LP Locked:</td><td>{{ $currency->lp_locked ? 'Yes' : 'No' }}</td></tr>
                        <tr><td>Mint:</td><td>{{ $currency->mint ? 'Yes' : 'No' }}</td></tr>
                        <tr><td>Freeze:</td><td>{{ $currency->freeze ? 'Yes' : 'No' }}</td></tr>
                        <tr><td>JITO:</td><td>{{ $currency->jito }}</td></tr>
                        <tr><td>Team Coins:</td><td>{{ $currency->team_coins }}</td></tr>
                        <tr><td>Ads Coins:</td><td>{{ $currency->ads_coins }}</td></tr>
                        <tr><td>Security %:</td><td>{{ $currency->security_percentage }}%</td></tr>
                        <tr><td>Listing Time:</td><td>{{ $currency->listing_time }}</td></tr>
                        <tr><td>DEX Listing:</td><td>{{ $currency->dex_listing ? 'Yes' : 'No' }}</td></tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endsection --}}

{{-- @section('content')
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
@endsection --}}
