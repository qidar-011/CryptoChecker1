@extends('website.layouts.app')

@section('title', 'Sign Up')

@section('styles')
    <!-- تضمين ملفات CSS الإضافية -->
    <link rel="stylesheet" href="{{ asset('website/css/signup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <div class="signup-container">
        <h2>Sign Up</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('signup.submit') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="mb-3">
                <label for="wallet" class="form-label">Wallet Address</label>
                <input type="text" class="form-control" id="wallet" name="wallet" value="{{ old('wallet') }}" required>
                @error('wallet')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Google reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
            @error('g-recaptcha-response')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <button type="submit" class="btn btn-signup mt-3">Sign Up</button>
        </form>

        <div class="social-login">
            <a href="{{ route('social.login', 'google') }}" class="social-btn btn-google">
                <i class="fab fa-google"></i> Google
            </a>
            <a href="{{ route('social.login', 'facebook') }}" class="social-btn btn-facebook">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="{{ route('social.login', 'apple') }}" class="social-btn btn-apple">
                <i class="fab fa-apple"></i> Apple
            </a>
        </div>

        <a href="{{ route('login') }}" class="link">Already have an account? Log In</a>
    </div>
@endsection

@section('scripts')
    <!-- سكريبتات إضافية -->
    {!! NoCaptcha::renderJs() !!}
@endsection
