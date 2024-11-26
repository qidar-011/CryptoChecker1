@extends('website.layouts.app')

@section('title', 'Solscan Transaction Result')

@section('styles')
    <!-- تضمين ملف CSS الخاص بـ Solscan -->
    <link rel="stylesheet" href="{{ asset('website/css/solscan.css') }}">
@endsection

@section('content')
    <div class="container my-5">
        <h2 class="text-center text-warning mb-4">Transaction Result</h2>

        {{-- قسم تفاصيل المعاملة --}}
        <div class="card">
            <div class="card-header">Transaction Details</div>
            <div class="card-body">
                <pre>{{ json_encode($transactionDetails, JSON_PRETTY_PRINT) }}</pre>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">Freeze Authority</div>
            <div class="card-body">
                @if($freezeResult)
                    <p class="text-success">Freeze Authority: None</p>
                @else
                    <p class="text-danger">Freeze Authority: Exists</p>
                @endif
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">Bundle Status</div>
            <div class="card-body">
                @if($bundleResult)
                    <p class="text-success">Bundle Not Found</p>
                @else
                    <p class="text-danger">Bundle Exists</p>
                @endif
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">Liquidity</div>
            <div class="card-body">
                <p>{{ $liquidity }} SOL</p>
            </div>
        </div>

        <a href="{{ route('solscan.show') }}" class="btn btn-secondary mt-4">Check Another Transaction</a>
    </div>
@endsection

@section('scripts')
    <!-- سكريبتات إضافية إذا لزم الأمر -->
@endsection
