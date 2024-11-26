@extends('website.layouts.app')

@section('title', 'Solscan Transaction Checker')

@section('styles')
    <!-- تضمين ملف CSS الخاص بـ Solscan -->
    <link rel="stylesheet" href="{{ asset('website/css/solscan.css') }}">
@endsection

@section('content')
    <div class="container my-5">
        <h2 class="text-center text-warning mb-4">Check Solscan Transaction</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('solscan.check') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tx" class="form-label">Transaction Signature</label>
                <input type="text" class="form-control" id="tx" name="tx" required>
            </div>
            <button type="submit" class="btn btn-primary">Check Transaction</button>
        </form>
    </div>
@endsection

@section('scripts')
    <!-- سكريبتات إضافية إذا لزم الأمر -->
@endsection
