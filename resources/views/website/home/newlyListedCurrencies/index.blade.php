
<h3 class="mb-4 text-center text-warning">Newly Listed Cryptocurrencies</h3>
<div class="coin-info">
    <h3 class="mb-4 text-center text-warning">Newly Listed Cryptocurrencies</h3>

    <div class="coin-info-header">
        <img src="{{ $currency->logo_url }}" alt="{{ $currency->symbol }}">
        <div>
            {{ $currency->name }} ({{ $currency->symbol }})<br>
            Network: {{ $currency->network }}<br>
            Expected Price: ${{ number_format($currency->expected_price, 2) }}
        </div>
    </div>
    <table class="coin-table">
        <tbody>
            <tr>
                <td>Total Supply:</td>
                <td>{{ number_format($currency->total_supply) }} {{ $currency->symbol }}</td>
            </tr>
            <tr>
                <td>Circulating Supply:</td>
                <td>{{ number_format($currency->circulating_supply) }} {{ $currency->symbol }}</td>
            </tr>
            <tr>
                <td>Next Supply:</td>
                <td>{{ number_format($currency->next_supply) }} {{ $currency->symbol }}</td>
            </tr>
            <tr>
                <td>LP Locked:</td>
                <td>{{ $currency->lp_locked ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Mint:</td>
                <td>{{ $currency->mint ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Freeze:</td>
                <td>{{ $currency->freeze ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>JITO:</td>
                <td>{{ $currency->jito }}</td>
            </tr>
            <tr>
                <td>Team Coins:</td>
                <td>{{ number_format($currency->team_coins) }} {{ $currency->symbol }}</td>
            </tr>
            <tr>
                <td>Ads Coins:</td>
                <td>{{ number_format($currency->ads_coins) }} {{ $currency->symbol }}</td>
            </tr>
            <tr>
                <td>Security %:</td>
                <td>{{ $currency->security_percentage }}%</td>
            </tr>
            <tr>
                <td>Listing Time:</td>
                <td>{{ $currency->listing_time }}</td>
            </tr>
            <tr>
                <td>DEX Listing:</td>
                <td>{{ $currency->dex_listing ? 'Yes' : 'No' }}</td>
            </tr>
        </tbody>
    </table>
</div>







{{-- @extends('website.layouts.app')
@section('title', 'Newly Listed Currencies')
@section('content')
    <div class="newly-listed-currencies">
        <h3 class="mb-4">Newly Listed Currencies</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Address</th>
                        <th>Network</th>
                        <th>Expected Price (USD)</th>
                        <th>Total Supply</th>
                        <th>Circulating Supply</th>
                        <th>Max Supply</th>
                        <th>Market Cap (USD)</th>
                        <th>Liquidity (USD)</th>
                        <th>LP Locked</th>
                        <th>Top Holders</th>
                        <th>Mint</th>
                        <th>Freeze</th>
                        <th>JITO</th>
                        <th>Security Audit</th>
                        <th>Contract Verified</th>
                        <th>Developer Team</th>
                        <th>Community Rating</th>
                        <th>Liquidity Rating</th>
                        <th>Project Quality</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($newlyListedCurrencies as $currency)
                        <tr>
                            <td>
                                <img src="{{ $currency->logo_url }}" alt="{{ $currency->symbol }}" width="50" height="50">
                            </td>
                            <td>{{ $currency->name }}</td>
                            <td>{{ $currency->symbol }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($currency->address, 15, '...') }}</td>
                            <td>{{ $currency->network }}</td>
                            <td>${{ number_format($currency->expected_price, 2) }}</td>
                            <td>{{ number_format($currency->total_supply) }}</td>
                            <td>{{ number_format($currency->circulating_supply) }}</td>
                            <td>{{ number_format($currency->max_supply) }}</td>
                            <td>${{ number_format($currency->market_cap, 2) }}</td>
                            <td>${{ number_format($currency->liquidity, 2) }}</td>
                            <td>{{ $currency->lp_locked ? 'Yes' : 'No' }}</td>
                            <td>
                                @if(!empty($currency->top_holders))
                                    <ul class="list-unstyled mb-0">
                                        @foreach(json_decode($currency->top_holders, true) as $holder)
                                            <li>{{ \Illuminate\Support\Str::limit($holder, 15, '...') }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $currency->mint ? 'Yes' : 'No' }}</td>
                            <td>{{ $currency->freeze ? 'Yes' : 'No' }}</td>
                            <td>{{ $currency->jito }}</td>
                            <td>{{ $currency->audit_results['security_audit'] ?? 'N/A' }}</td>
                            <td>{{ isset($currency->audit_results['contract_verified']) && $currency->audit_results['contract_verified'] ? 'Yes' : 'No' }}</td>
                            <td>{{ $currency->audit_results['developer_team'] ?? 'N/A' }}</td>
                            <td>{{ $currency->coin_rating['community'] ?? 'N/A' }}/5</td>
                            <td>{{ $currency->coin_rating['liquidity'] ?? 'N/A' }}/5</td>
                            <td>{{ $currency->coin_rating['project_quality'] ?? 'N/A' }}/5</td>
                            <td>
                                <a href="{{ route('website.home.newlyListedCurrencies.show', $currency->id) }}" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="22" class="text-center">No newly listed currencies available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection --}}

{{-- <div class="newly-listed-currencies">
    <h3>Newly Listed Currencies</h3>
    @forelse($newlyListedCurrencies as $currency)
        <div class="currency-card">
            <img src="{{ $currency->logo_url }}" alt="{{ $currency->symbol }}">
            <div class="currency-details">
                <div class="currency-name">{{ $currency->name }} ({{ $currency->symbol }})</div>
                <p><strong>Address:</strong> {{ $currency->address }}</p>
                <p><strong>Network:</strong> {{ $currency->network }}</p>
                <p><strong>Expected Price:</strong> ${{ number_format($currency->expected_price, 2) }}</p>
                <!--  إضافة المزيد من التفاصيل هنا -->
            </div>
        </div>
    @empty
        <p>No newly listed currencies available.</p>
    @endforelse
</div>
 --}}