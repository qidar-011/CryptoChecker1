@extends('website.layouts.app')

@section('title', 'Telegram Bots')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Telegram Bots -->
    <link rel="stylesheet" href="{{ asset('website/css/tBot.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Telegram Bots -->
    <div class="container my-5">
        <h2 class="text-center text-warning mb-4">Available Telegram Bots</h2>

        <!-- كروت البوتات -->
        @foreach($bots as $bot)
            <div class="card">
                <div class="card-header">{{ $bot['name'] }}</div>
                <div class="card-body">
                    <img src="{{ $bot['image'] }}" alt="{{ $bot['name'] }} Photo">
                    <p class="mt-3"><span class="highlight">Features:</span> {{ $bot['features'] }}</p>
                    <p class="plan"><span class="highlight">Plan:</span> {{ $bot['plan'] }}</p>
                    <a href="#" class="btn-subscribe">{{ $bot['button_text'] }}</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- خطط الاشتراك -->
    {{-- <div class="container my-5">
        <h2 class="pricing-header">Subscription Plans</h2>
        <div class="row">
            <!-- خطة Free Plan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Free Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul>
                            <li>Basic bot access</li>
                            <li>Alerts and market updates</li>
                            <li>Limited airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Join for Free</button>
                    </div>
                </div>
            </div>
            <!-- خطة Premium Plan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Premium Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul>
                            <li>Advanced trading signals</li>
                            <li>Portfolio tracking and live updates</li>
                            <li>Exclusive airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for $19.99/month</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- خطط الاشتراك -->
    <div class="container my-5 subscription-plans">
        <h2 class="pricing-header">Subscription Plans</h2>
        <div class="row">
            <!-- خطة Free Plan -->
            <div class="col-md-6">
                {{-- <div class="card shadow-sm tbot-card"> --}}
                <div class="card shadow-sm tbot-card">
                    <div class="card-header">Free Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul class="list-group">
                            <li class="list-group-item">Basic bot access</li>
                            <li class="list-group-item">Alerts and market updates</li>
                            <li class="list-group-item">Limited airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Join for Free</button>
                    </div>
                </div>
            </div>
            <!-- خطة Premium Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm tbot-card">
                    <div class="card-header">Premium Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul class="list-group">
                            <li class="list-group-item">Advanced trading signals</li>
                            <li class="list-group-item">Portfolio tracking and live updates</li>
                            <li class="list-group-item">Exclusive airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for $19.99/month</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- شروط الاشتراك -->
    {{-- <div class="container my-5">
        <h2 class="pricing-header">Subscription Terms</h2>
        <ul>
            <li>The minimum amount for Premium Plan is $19.99 per month.</li>
            <li>Free Plan users will have limited access to certain bots and features.</li>
            <li>All bot notifications are subject to verification and approval.</li>
            <li>Cancellation of subscription is allowed at any time with no additional fees.</li>
            <li>Exclusive bots are available for Premium Plan users only.</li>
        </ul>
    </div> --}}

    <!-- شروط الاشتراك -->
    <div class="container my-5 subscription-terms">
        <h2 class="pricing-header">Subscription Terms</h2>
        <ul class="list-group">
            <li class="list-group-item">The minimum amount for Premium Plan is $19.99 per month.</li>
            <li class="list-group-item">Free Plan users will have limited access to certain bots and features.</li>
            <li class="list-group-item">All bot notifications are subject to verification and approval.</li>
            <li class="list-group-item">Cancellation of subscription is allowed at any time with no additional fees.</li>
            <li class="list-group-item">Exclusive bots are available for Premium Plan users only.</li>
        </ul>
    </div>
    
@endsection


{{-- @extends('website.layouts.app')

@section('title', 'Telegram Bots')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Telegram Bots -->
    <link rel="stylesheet" href="{{ asset('website/css/tBot.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Telegram Bots -->
    <div class="container my-5">
        <h2 class="pricing-header">Available Telegram Bots</h2>

        <!-- كروت البوتات -->
        @foreach($bots as $bot)
            <div class="card shadow-sm tbot-card">
                <div class="card-header">
                    {{ $bot['name'] }}
                </div>
                <div class="card-body">
                    <img src="{{ $bot['image'] }}" alt="{{ $bot['name'] }} Photo">
                    <p><strong>Features:</strong> {{ $bot['features'] }}</p>
                    <p><strong>Plan:</strong> {{ $bot['plan'] }}</p>
                    <a href="#" class="btn-subscribe">{{ $bot['button_text'] }}</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- خطط الاشتراك -->
    <div class="container my-5">
        <h2 class="pricing-header">Subscription Plans</h2>
        <div class="row">
            <!-- خطة Free Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm tbot-card">
                    <div class="card-header">Free Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul class="list-group">
                            <li class="list-group-item">Basic bot access</li>
                            <li class="list-group-item">Alerts and market updates</li>
                            <li class="list-group-item">Limited airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Join for Free</button>
                    </div>
                </div>
            </div>
            <!-- خطة Premium Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm tbot-card">
                    <div class="card-header">Premium Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul class="list-group">
                            <li class="list-group-item">Advanced trading signals</li>
                            <li class="list-group-item">Portfolio tracking and live updates</li>
                            <li class="list-group-item">Exclusive airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for $19.99/month</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- شروط الاشتراك -->
    <div class="container my-5">
        <h2 class="pricing-header">Subscription Terms</h2>
        <ul class="list-group">
            <li class="list-group-item">The minimum amount for Premium Plan is $19.99 per month.</li>
            <li class="list-group-item">Free Plan users will have limited access to certain bots and features.</li>
            <li class="list-group-item">All bot notifications are subject to verification and approval.</li>
            <li class="list-group-item">Cancellation of subscription is allowed at any time with no additional fees.</li>
            <li class="list-group-item">Exclusive bots are available for Premium Plan users only.</li>
        </ul>
    </div>
@endsection
 --}}




{{-- @extends('website.layouts.app')

@section('title', 'Telegram Bots')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Telegram Bots -->
    <link rel="stylesheet" href="{{ asset('website/css/tBot.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Telegram Bots -->
    <div class="container my-5">
        <h2 class="text-center text-warning mb-4">Available Telegram Bots</h2>

        <!-- كروت البوتات -->
        @foreach($bots as $bot)
            <div class="card tbot-card shadow-sm mx-auto" style="max-width: 500px;">
                <div class="card-header">
                    {{ $bot['name'] }}
                </div>
                <div class="card-body">
                    <img src="{{ $bot['image'] }}" alt="{{ $bot['name'] }} Photo">
                    <p class="mt-3"><span class="highlight">Features:</span> {{ $bot['features'] }}</p>
                    <p class="plan"><span class="highlight">Plan:</span> {{ $bot['plan'] }}</p>
                    <a href="#" class="btn-subscribe">{{ $bot['button_text'] }}</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- خطط الاشتراك -->
    <div class="container my-5">
        <h2 class="pricing-header">Subscription Plans</h2>
        <div class="row">
            <!-- خطة Free Plan -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header">Free Plan</div>
                    <div class="card-body">
                        <p>This plan includes:</p>
                        <ul>
                            <li>Basic bot access</li>
                            <li>Alerts and market updates</li>
                            <li>Limited airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Join for Free</button>
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
                            <li>Advanced trading signals</li>
                            <li>Portfolio tracking and live updates</li>
                            <li>Exclusive airdrop notifications</li>
                        </ul>
                        <button class="btn-subscribe">Subscribe for $19.99/month</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- شروط الاشتراك -->
    <div class="container my-5">
        <h2 class="pricing-header">Subscription Terms</h2>
        <ul class="list-group">
            <li class="list-group-item">The minimum amount for Premium Plan is $19.99 per month.</li>
            <li class="list-group-item">Free Plan users will have limited access to certain bots and features.</li>
            <li class="list-group-item">All bot notifications are subject to verification and approval.</li>
            <li class="list-group-item">Cancellation of subscription is allowed at any time with no additional fees.</li>
            <li class="list-group-item">Exclusive bots are available for Premium Plan users only.</li>
        </ul>
    </div>
@endsection
 --}}