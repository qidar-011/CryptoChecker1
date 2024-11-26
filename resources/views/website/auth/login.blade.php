@extends('website.layouts.app')

@section('title', 'Login')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Login -->
    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <div class="login-container">
        <h2>Login</h2>
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
        <form action="{{ route('login.submit') }}" method="post">
            @csrf
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
            <!-- Google reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
            @error('g-recaptcha-response')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            
            <!-- Google reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>

            <button type="submit" class="btn btn-login mt-3">Login</button>
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

        <a href="{{ route('signup') }}" class="link">Don't have an account? Sign Up</a>
    </div>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection

@section('scripts')
    <!-- سكريبتات إضافية -->
    {!! NoCaptcha::renderJs() !!}
@endsection

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

