@extends('website.layouts.app')

@section('title', 'Raw Transaction Data')

@section('styles')
    <!-- تضمين ملف CSS الخاص بـ Solana -->
    <link rel="stylesheet" href="{{ asset('website/css/solscan.css') }}">
@endsection

@section('content')
    <div class="container my-5">
        <h2 class="text-center text-warning mb-4">Raw Transaction Data</h2>

        <div class="card">
            <div class="card-body">
                <pre>{{ json_encode($rawData, JSON_PRETTY_PRINT) }}</pre>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- سكريبتات إضافية إذا لزم الأمر -->
@endsection
