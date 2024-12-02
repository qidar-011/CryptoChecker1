
@extends('dashboard.layouts.master')

@section('title')
    BES - Dashboard
@stop

@section('css')

@endsection

@section('title_page1')
    Home
@endsection

@section('title_page2')
    Dashboard
@endsection

@section('content')
    <!-- اكتب محتوى الصفحة هنا -->
    <div class="container-fluid">
        <h1>Welcome to the Dashboard</h1>
        <!-- باقي المحتوى -->
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CryptoChecker Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <p>Welcome to your dashboard!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





@section('scripts')

@endsection



{{-- @extends('dashboard.layouts.master')

@section('title', 'Dashboard')

@section('content')
<!-- اكتب محتوى الصفحة هنا -->
<div class="container-fluid">
    <h1>Welcome to the Dashboard</h1>
    <!-- باقي المحتوى -->
</div>
@endsection --}}



{{-- @extends('dashboard.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">CryptoChecker Dashboard</h3>
                </div>
                <div class="card-body">
                    <p>Welcome to your dashboard!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}