@extends('website.layouts.app')

@section('title', 'Airdrops')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Airdrops -->
    <link rel="stylesheet" href="{{ asset('website/css/airdrops.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Airdrops -->
    <div class="container">
        <h2 class="text-warning text-center mb-4">Available Airdrops on Solana Network</h2>

        <!-- كروت الأيردروبات -->
        @foreach($airdrops as $airdrop)
            <div class="card shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-header">
                    {{ $airdrop['name'] }}
                </div>
                <div class="card-body">
                    <img src="{{ $airdrop['logo'] }}" alt="{{ $airdrop['name'] }} Logo">
                    <p><strong>Drop Amount:</strong> {{ $airdrop['amount'] }}</p>
                    <p><strong>Requirements:</strong> {{ $airdrop['requirements'] }}</p>
                    <p><strong>End Date:</strong> {{ $airdrop['end_date'] }}</p>
                    <a href="#" class="btn-subscribe">Claim Airdrop</a>
                </div>
            </div>
        @endforeach

        <!-- خطط الاشتراك -->
        {{-- <h2 class="pricing-header">Subscription Plans</h2>
        <div class="row">
            <!-- خطة Free Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">Free Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul>
                            <li>Basic token analysis</li>
                            <li>Access to free airdrops</li>
                            <li>Market insights</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for Free</button>
                    </div>
                </div>
            </div>
            <!-- خطة Premium Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">Premium Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul>
                            <li>Advanced token analysis</li>
                            <li>Access to all airdrops</li>
                            <li>Real-time market data</li>
                            <li>Priority support</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for $49.99/month</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- خطط الاشتراك -->
    <h2 class="pricing-header">Subscription Plans</h2>
    <div class="row">
        <!-- خطة Free Plan -->
        <div class="col-md-6">
            <div class="card shadow-sm airdrop-card">
                <div class="card-header">Free Plan</div>
                <div class="card-body">
                    <p>This plan includes:</p>
                    <ul class="list-group">
                        <li class="list-group-item">Basic token analysis</li>
                        <li class="list-group-item">Access to free airdrops</li>
                        <li class="list-group-item">Market insights</li>
                    </ul>
                    <button class="btn-subscribe">Subscribe for Free</button>
                </div>
            </div>
        </div>
        <!-- خطة Premium Plan -->
        <div class="col-md-6">
            <div class="card shadow-sm airdrop-card">
                <div class="card-header">Premium Plan</div>
                <div class="card-body">
                    <p>This plan includes:</p>
                    <ul class="list-group">
                        <li class="list-group-item">Advanced token analysis</li>
                        <li class="list-group-item">Access to all airdrops</li>
                        <li class="list-group-item">Real-time market data</li>
                        <li class="list-group-item">Priority support</li>
                    </ul>
                    <button class="btn-subscribe">Subscribe for $49.99/month</button>
                </div>
            </div>
        </div>
    </div>
    

        <!-- شروط الاشتراك -->
        <h2 class="pricing-header">Subscription Requirements</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Minimum Balance</th>
                    <th>Commitment Period</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Free Plan</td>
                    <td>None</td>
                    <td>No commitment</td>
                </tr>
                <tr>
                    <td>Premium Plan</td>
                    <td>$100 in crypto assets</td>
                    <td>6 months</td>
                </tr>
            </tbody>
        </table>

        <h2 class="pricing-header" >Subscription Terms</h2>
        <ul class="list-group">
            <li class="list-group-item">The minimum amount for Premium Plan is $49.99 per month.</li>
            <li class="list-group-item">Free Plan users will have limited access to certain airdrops.</li>
            <li class="list-group-item">All airdrop notifications are subject to verification and approval.</li>
            <li class="list-group-item">Cancellation of subscription is allowed at any time with no additional fees.</li>
            <li class="list-group-item">Exclusive airdrops are available for Premium Plan users only.</li>
        </ul>
    </div>



    

    <!-- شروط الاشتراك -->
    {{-- <h2 class="pricing-header">Subscription Requirements</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Plan</th>
                <th>Minimum Balance</th>
                <th>Commitment Period</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Free Plan</td>
                <td>None</td>
                <td>No commitment</td>
            </tr>
            <tr>
                <td>Premium Plan</td>
                <td>$100 in crypto assets</td>
                <td>6 months</td>
            </tr>
        </tbody>
    </table>

    <h3 class="pricing-header">Subscription Terms</h3>
    <ul class="list-group">
        <li class="list-group-item">The minimum amount for Premium Plan is $49.99 per month.</li>
        <li class="list-group-item">Free Plan users will have limited access to certain airdrops.</li>
        <li class="list-group-item">All airdrop notifications are subject to verification and approval.</li>
        <li class="list-group-item">Cancellation of subscription is allowed at any time with no additional fees.</li>
        <li class="list-group-item">Exclusive airdrops are available for Premium Plan users only.</li>
    </ul> --}}
@endsection


{{-- @extends('website.layouts.app')

@section('title', 'Airdrops')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Airdrops -->
    <link rel="stylesheet" href="{{ asset('website/css/airdrops.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Airdrops -->
    <div class="container">
        <h2 class="pricing-header">Available Airdrops on Solana Network</h2>

        <!-- كروت الأيردروبات -->
        @foreach($airdrops as $airdrop)
            <div class="card shadow-sm airdrop-card">
                <div class="card-header">
                    {{ $airdrop['name'] }}
                </div>
                <div class="card-body">
                    <img src="{{ $airdrop['logo'] }}" alt="{{ $airdrop['name'] }} Logo">
                    <p><strong>Drop Amount:</strong> {{ $airdrop['amount'] }}</p>
                    <p><strong>Requirements:</strong> {{ $airdrop['requirements'] }}</p>
                    <p><strong>End Date:</strong> {{ $airdrop['end_date'] }}</p>
                    <a href="#" class="btn-subscribe">Claim Airdrop</a>
                </div>
            </div>
        @endforeach

        <!-- خطط الاشتراك -->
        <h2 class="pricing-header">Subscription Plans</h2>
        <div class="row">
            <!-- خطة Free Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm airdrop-card">
                    <div class="card-header">Free Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul class="list-group">
                            <li class="list-group-item">Basic token analysis</li>
                            <li class="list-group-item">Access to free airdrops</li>
                            <li class="list-group-item">Market insights</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for Free</button>
                    </div>
                </div>
            </div>
            <!-- خطة Premium Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm airdrop-card">
                    <div class="card-header">Premium Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul class="list-group">
                            <li class="list-group-item">Advanced token analysis</li>
                            <li class="list-group-item">Access to all airdrops</li>
                            <li class="list-group-item">Real-time market data</li>
                            <li class="list-group-item">Priority support</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for $49.99/month</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- شروط الاشتراك -->
        <h2 class="pricing-header">Subscription Requirements</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Minimum Balance</th>
                    <th>Commitment Period</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Free Plan</td>
                    <td>None</td>
                    <td>No commitment</td>
                </tr>
                <tr>
                    <td>Premium Plan</td>
                    <td>$100 in crypto assets</td>
                    <td>6 months</td>
                </tr>
            </tbody>
        </table>

        <h3 class="pricing-header">Subscription Terms</h3>
        <ul class="list-group">
            <li class="list-group-item">The minimum amount for Premium Plan is $49.99 per month.</li>
            <li class="list-group-item">Free Plan users will have limited access to certain airdrops.</li>
            <li class="list-group-item">All airdrop notifications are subject to verification and approval.</li>
            <li class="list-group-item">Cancellation of subscription is allowed at any time with no additional fees.</li>
            <li class="list-group-item">Exclusive airdrops are available for Premium Plan users only.</li>
        </ul>
    </div>
@endsection
 --}}





{{-- @extends('website.layouts.app')

@section('title', 'Airdrops')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Airdrops -->
    <link rel="stylesheet" href="{{ asset('website/css/airdrops.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Airdrops -->
    <div class="container">
        <h2 class="text-warning text-center mb-4">Available Airdrops on Solana Network</h2>

        <!-- كروت الأيردروبات -->
        @foreach($airdrops as $airdrop)
            <div class="card shadow-sm mx-auto airdrop-card" style="max-width: 500px;">
                <div class="card-header">
                    {{ $airdrop['name'] }}
                </div>
                <div class="card-body">
                    <img src="{{ $airdrop['logo'] }}" alt="{{ $airdrop['name'] }} Logo">
                    <p><strong>Drop Amount:</strong> {{ $airdrop['amount'] }}</p>
                    <p><strong>Requirements:</strong> {{ $airdrop['requirements'] }}</p>
                    <p><strong>End Date:</strong> {{ $airdrop['end_date'] }}</p>
                    <a href="#" class="btn-subscribe">Claim Airdrop</a>
                </div>
            </div>
        @endforeach

        <!-- خطط الاشتراك -->
        <h2 class="pricing-header">Subscription Plans</h2>
        <div class="row">
            <!-- خطة Free Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">Free Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul>
                            <li>Basic token analysis</li>
                            <li>Access to free airdrops</li>
                            <li>Market insights</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for Free</button>
                    </div>
                </div>
            </div>
            <!-- خطة Premium Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">Premium Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul>
                            <li>Advanced token analysis</li>
                            <li>Access to all airdrops</li>
                            <li>Real-time market data</li>
                            <li>Priority support</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for $49.99/month</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- شروط الاشتراك -->
        <h2 class="pricing-header">Subscription Requirements</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Minimum Balance</th>
                    <th>Commitment Period</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Free Plan</td>
                    <td>None</td>
                    <td>No commitment</td>
                </tr>
                <tr>
                    <td>Premium Plan</td>
                    <td>$100 in crypto assets</td>
                    <td>6 months</td>
                </tr>
            </tbody>
        </table>

        <h3 class="pricing-header">Subscription Terms</h3>
        <ul class="list-group">
            <li class="list-group-item">The minimum amount for Premium Plan is $49.99 per month.</li>
            <li class="list-group-item">Free Plan users will have limited access to certain airdrops.</li>
            <li class="list-group-item">All airdrop notifications are subject to verification and approval.</li>
            <li class="list-group-item">Cancellation of subscription is allowed at any time with no additional fees.</li>
            <li class="list-group-item">Exclusive airdrops are available for Premium Plan users only.</li>
        </ul>
    </div>
@endsection
 --}}