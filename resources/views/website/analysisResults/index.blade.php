@extends('website.layouts.app')

@section('title', 'Analysis Results')

@section('content')
    <div class="coin-info">
        <!-- شعار العملة والمعلومات الرئيسية -->
        <div class="coin-info-header">
            <img src="{{ $analysisResult['logo_url'] ?? asset('website/images/default-token.png') }}" alt="{{ $analysisResult['symbol'] }}" width="50">
            <div class="coin-details">
                <div class="coin-name">{{ $analysisResult['name'] }} ({{ $analysisResult['symbol'] }})</div>
                <div class="coin-network">Network: {{ $analysisResult['network'] }}</div>
                <div class="coin-price">Price: ${{ number_format($analysisResult['price_usd'], 6) }}</div>
                <div class="coin-growth">Market Cap: ${{ number_format($analysisResult['market_cap'], 2) }}</div>
            </div>
        </div>

        <!-- الجدول الأول لبيانات العملة -->
        <div class="coin-table-container">
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Total Supply:</td>
                        <td>{{ number_format($analysisResult['total_supply'], 0, '.', ',') }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Circulating Supply:</td>
                        <td>{{ number_format($analysisResult['circulating_supply'], 0, '.', ',') }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Trading Volume:</td>
                        <td>${{ number_format($analysisResult['trading_volume'], 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td>Market Cap:</td>
                        <td>${{ number_format($analysisResult['market_cap'], 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td>Liquidity:</td>
                        <td>${{ number_format($analysisResult['liquidity'], 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td>Freeze Authority:</td>
                        <td>{{ $analysisResult['freeze'] ? 'Exists' : 'None' }}</td>
                    </tr>
                    <tr>
                        <td>Mint Authority:</td>
                        <td>{{ $analysisResult['mint'] ? 'Exists' : 'None' }}</td>
                    </tr>
                    <tr>
                        <td>JITO:</td>
                        <td>{{ $analysisResult['jito'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- عرض Top Holders -->
        <div class="coin-table-container">
            <h5>Top 5 Holders</h5>
            <table class="coin-table">
                <tbody>
                    @forelse($analysisResult['top_holders'] as $index => $holder)
                        <tr>
                            <td>{{ $index + 1 }}.</td>
                            <td>{{ $holder }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No Top Holders data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Audit Results -->
        <div class="coin-table-container">
            <h5>Audit Results</h5>
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Security Audit:</td>
                        <td>{{ $analysisResult['audit_results']['security_audit'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Contract Verified:</td>
                        <td>{{ $analysisResult['audit_results']['contract_verified'] ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Developer Team:</td>
                        <td>{{ $analysisResult['audit_results']['developer_team'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Token Rating -->
        <div class="coin-table-container">
            <h5>Token Rating</h5>
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Community:</td>
                        <td>{{ $analysisResult['token_rating']['community'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Liquidity:</td>
                        <td>{{ $analysisResult['token_rating']['liquidity'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Project Quality:</td>
                        <td>{{ $analysisResult['token_rating']['project_quality'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


{{-- @extends('website.layouts.app')

@section('title', 'Analysis Results')

@section('content')
    <!-- محتوى صفحة نتائج الفحص -->
    <div class="coin-info">
        <!-- شعار العملة والمعلومات الرئيسية -->
        <div class="coin-info-header">
            <img src="{{ $analysisResult['logo_url'] }}" alt="{{ $analysisResult['symbol'] }}">
            <div class="coin-details">
                <div class="coin-name">{{ $analysisResult['name'] }} ({{ $analysisResult['symbol'] }})</div>
                <div class="coin-network">Network: {{ $analysisResult['network'] }}</div>
                <div class="coin-price">Expected Price: ${{ number_format($analysisResult['expected_price'], 2) }}</div>
                <div class="coin-growth">Growth Percentage: {{ number_format($analysisResult['growth_percentage'], 2) }}%</div>
            </div>
        </div>

        <!-- الجدول الأول لبيانات العملة -->
        <div class="coin-table-container">
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Network:</td>
                        <td>{{ $analysisResult['network'] }}</td>
                    </tr>
                    <tr>
                        <td>Total Supply:</td>
                        <td>{{ number_format($analysisResult['total_supply']) }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Circulating Supply:</td>
                        <td>{{ number_format($analysisResult['circulating_supply']) }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Max Supply:</td>
                        <td>{{ number_format($analysisResult['max_supply']) }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Market Cap:</td>
                        <td>${{ number_format($analysisResult['market_cap'], 2) }}</td>
                    </tr>
                    <tr>
                        <td>Liquidity:</td>
                        <td>${{ number_format($analysisResult['liquidity'], 2) }}</td>
                    </tr>
                    <tr>
                        <td>LP Locked:</td>
                        <td>{{ $analysisResult['lp_locked'] ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- عرض Top Holders -->
        <div class="coin-table-container">
            <h5>Top Holders</h5>
            <table class="coin-table">
                <tbody>
                    @forelse($analysisResult['top_holders'] as $index => $holder)
                        <tr>
                            <td>{{ $index + 1 }}.</td>
                            <td>{{ $holder }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No Top Holders data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- جدول Mint, Freeze, JITO -->
        <div class="coin-table-container">
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Mint:</td>
                        <td>{{ $analysisResult['mint'] ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Freeze:</td>
                        <td>{{ $analysisResult['freeze'] ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>JITO:</td>
                        <td>{{ $analysisResult['jito'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Audit Results -->
        <div class="coin-table-container">
            <h5>Audit Results</h5>
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Security Audit:</td>
                        <td>{{ $analysisResult['audit_results']['security_audit'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Contract Verified:</td>
                        <td>{{ isset($analysisResult['audit_results']['contract_verified']) && $analysisResult['audit_results']['contract_verified'] ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Developer Team:</td>
                        <td>{{ $analysisResult['audit_results']['developer_team'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Coin Rating -->
        <div class="coin-table-container">
            <h5>Coin Rating</h5>
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Community:</td>
                        <td>{{ $analysisResult['coin_rating']['community'] ?? 'N/A' }}/5</td>
                    </tr>
                    <tr>
                        <td>Liquidity:</td>
                        <td>{{ $analysisResult['coin_rating']['liquidity'] ?? 'N/A' }}/5</td>
                    </tr>
                    <tr>
                        <td>Project Quality:</td>
                        <td>{{ $analysisResult['coin_rating']['project_quality'] ?? 'N/A' }}/5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
 --}}





{{-- @extends('website.layouts.app')
@section('title', 'Analysis Results')
@section('content')
    <!-- محتوى صفحة نتائج الفحص -->
    <div class="coin-info">
        <!-- شعار العملة والمعلومات الرئيسية -->
        <div class="coin-info-header">
            <img src="{{ $analysisResult['logo_url'] }}" alt="{{ $analysisResult['symbol'] }}">
            <div class="coin-details">
                <div class="coin-name">{{ $analysisResult['name'] }} ({{ $analysisResult['symbol'] }})</div>
                <div class="coin-network">Network: {{ $analysisResult['network'] }}</div>
                <div class="coin-price">Expected Price: ${{ number_format($analysisResult['expected_price'], 2) }}</div>
                <div class="coin-growth">Growth Percentage: {{ number_format($analysisResult['growth_percentage'], 2) }}%</div>
            </div>
        </div>

        <!-- الجدول الأول لبيانات العملة -->
        <div class="coin-table-container">
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Network:</td>
                        <td>{{ $analysisResult['network'] }}</td>
                    </tr>
                    <tr>
                        <td>Total Supply:</td>
                        <td>{{ number_format($analysisResult['total_supply']) }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Circulating Supply:</td>
                        <td>{{ number_format($analysisResult['circulating_supply']) }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Max Supply:</td>
                        <td>{{ number_format($analysisResult['max_supply']) }} {{ $analysisResult['symbol'] }}</td>
                    </tr>
                    <tr>
                        <td>Market Cap:</td>
                        <td>${{ number_format($analysisResult['market_cap'], 2) }}</td>
                    </tr>
                    <tr>
                        <td>Liquidity:</td>
                        <td>${{ number_format($analysisResult['liquidity'], 2) }}</td>
                    </tr>
                    <tr>
                        <td>LP Locked:</td>
                        <td>{{ $analysisResult['lp_locked'] ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- عرض Top Holders -->
        <div class="coin-table-container">
            <h5>Top Holders</h5>
            <table class="coin-table">
                <tbody>
                    @forelse($analysisResult['top_holders'] as $index => $holder)
                        <tr>
                            <td>{{ $index + 1 }}.</td>
                            <td>{{ $holder }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No Top Holders data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- جدول Mint, Freeze, JITO -->
        <div class="coin-table-container">
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Mint:</td>
                        <td>{{ $analysisResult['mint'] ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Freeze:</td>
                        <td>{{ $analysisResult['freeze'] ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>JITO:</td>
                        <td>{{ $analysisResult['jito'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Audit Results -->
        <div class="coin-table-container">
            <h5>Audit Results</h5>
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Security Audit:</td>
                        <td>{{ $analysisResult['audit_results']['security_audit'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Contract Verified:</td>
                        <td>{{ isset($analysisResult['audit_results']['contract_verified']) && $analysisResult['audit_results']['contract_verified'] ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Developer Team:</td>
                        <td>{{ $analysisResult['audit_results']['developer_team'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Coin Rating -->
        <div class="coin-table-container">
            <h5>Coin Rating</h5>
            <table class="coin-table">
                <tbody>
                    <tr>
                        <td>Community:</td>
                        <td>{{ $analysisResult['coin_rating']['community'] ?? 'N/A' }}/5</td>
                    </tr>
                    <tr>
                        <td>Liquidity:</td>
                        <td>{{ $analysisResult['coin_rating']['liquidity'] ?? 'N/A' }}/5</td>
                    </tr>
                    <tr>
                        <td>Project Quality:</td>
                        <td>{{ $analysisResult['coin_rating']['project_quality'] ?? 'N/A' }}/5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection --}}









{{-- @extends('website.layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- عنوان صفحة نتائج الفحص -->
        <h2 class="text-center">{{ $result['name'] }} ({{ $result['symbol'] }}) Analysis Results</h2>
        
        <!-- معلومات العملة الرئيسية -->
        <div class="coin-info my-4 p-4 border rounded">
            <div class="coin-info-header d-flex align-items-center mb-4">
                <!-- صورة العملة -->
                <img src="https://cryptologos.cc/logos/{{ strtolower($result['symbol']) }}-logo.png" alt="{{ $result['symbol'] }}" class="me-3" style="width: 60px; height: 60px;">
                
                <!-- تفاصيل العملة الرئيسية -->
                <div class="coin-details">
                    <h3 class="coin-name">{{ $result['name'] }} ({{ $result['symbol'] }})</h3>
                    <p class="coin-network mb-0">Network: {{ $result['network'] }}</p>
                    <p class="coin-price mb-0">Expected Price: ${{ $result['expected_price'] }}</p>
                    <p class="coin-growth">Growth Percentage: {{ $result['growth_percentage'] }}%</p>
                </div>
            </div>
            
            <!-- الجدول الأول لبيانات العملة -->
            <div class="coin-table-container my-4">
                <h5>Token Details</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Total Supply:</td>
                            <td>{{ number_format($result['total_supply']) }} {{ $result['symbol'] }}</td>
                        </tr>
                        <tr>
                            <td>Circulating Supply:</td>
                            <td>{{ number_format($result['circulating_supply']) }} {{ $result['symbol'] }}</td>
                        </tr>
                        <tr>
                            <td>Max Supply:</td>
                            <td>{{ number_format($result['max_supply']) }} {{ $result['symbol'] }}</td>
                        </tr>
                        <tr>
                            <td>Market Cap:</td>
                            <td>${{ number_format($result['market_cap'], 2) }}</td>
                        </tr>
                        <tr>
                            <td>Liquidity:</td>
                            <td>${{ number_format($result['liquidity'], 2) }}</td>
                        </tr>
                        <tr>
                            <td>LP Locked:</td>
                            <td>{{ $result['lp_locked'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- الجدول الثاني Top Holders -->
            <div class="coin-table-container my-4">
                <h5>Top Holders</h5>
                <table class="table table-bordered">
                    <tbody>
                        @foreach ($result['top_holders'] as $index => $holder)
                            <tr>
                                <td>{{ $index + 1 }}.</td>
                                <td>{{ $holder }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- الجدول الثالث الخاص بـ Mint, Freeze, JITO -->
            <div class="coin-table-container my-4">
                <h5>Token Functions</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Mint:</td>
                            <td>{{ $result['mint'] }}</td>
                        </tr>
                        <tr>
                            <td>Freeze:</td>
                            <td>{{ $result['freeze'] }}</td>
                        </tr>
                        <tr>
                            <td>JITO:</td>
                            <td>{{ $result['jito'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- الجدول الرابع الخاص بتفاصيل الفحص و تقييم العملة -->
            <div class="coin-table-container my-4">
                <h5>Audit Results</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Security Audit:</td>
                            <td>{{ $result['audit_results']['security_audit'] }}</td>
                        </tr>
                        <tr>
                            <td>Contract Verified:</td>
                            <td>{{ $result['audit_results']['contract_verified'] }}</td>
                        </tr>
                        <tr>
                            <td>Developer Team:</td>
                            <td>{{ $result['audit_results']['developer_team'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- الجدول الخامس الخاص بـ Coin Rating -->
            <div class="coin-table-container my-4">
                <h5>Coin Rating</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Community:</td>
                            <td>{{ $result['coin_rating']['community'] }}/5</td>
                        </tr>
                        <tr>
                            <td>Liquidity:</td>
                            <td>{{ $result['coin_rating']['liquidity'] }}/5</td>
                        </tr>
                        <tr>
                            <td>Project Quality:</td>
                            <td>{{ $result['coin_rating']['project_quality'] }}/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection --}}
