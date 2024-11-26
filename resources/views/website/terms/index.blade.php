@extends('website.layouts.app')

@section('title', 'Terms & Conditions')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Terms & Conditions -->
    <link rel="stylesheet" href="{{ asset('website/css/terms.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Terms & Conditions -->
    <div class="container">
        <h2 class="terms-header">Terms & Conditions</h2>

        <!-- قسم المقدمة -->
        <div class="terms-section">
            <h3>Introduction</h3>
            <p>Welcome to CryptoChecker. These terms and conditions outline the rules and regulations for the use of our platform. By accessing this website, we assume you accept these terms and conditions in full. Do not continue to use CryptoChecker if you do not agree to all of the terms and conditions stated on this page.</p>
        </div>

        <!-- قسم حقوق الاستخدام -->
        <div class="terms-section">
            <h3>User Rights & Responsibilities</h3>
            <ul>
                <li><strong>Access:</strong> You are granted access to use our platform as long as you comply with these terms.</li>
                <li><strong>Account Safety:</strong> You are responsible for maintaining the security of your account credentials.</li>
                <li><strong>Prohibited Activities:</strong> You agree not to engage in any unlawful activities on the platform.</li>
            </ul>
        </div>

        <!-- قسم الخصوصية -->
        <div class="terms-section">
            <h3>Privacy Policy</h3>
            <p>We prioritize your privacy. Please read our Privacy Policy to understand how we collect and use your personal information.</p>
        </div>

        <!-- قسم الإلغاء -->
        <div class="terms-section">
            <h3>Cancellation & Termination</h3>
            <p>Users may cancel their subscription at any time through their account dashboard. CryptoChecker reserves the right to terminate accounts that violate the terms of service or engage in activities that compromise the platform's integrity.</p>
        </div>

        <!-- قسم التغييرات -->
        <div class="terms-section">
            <h3>Modifications to Terms</h3>
            <p>CryptoChecker reserves the right to update or modify these terms at any time without prior notice. Users will be informed of any changes, and continued use of the platform after changes constitutes acceptance of the revised terms.</p>
        </div>

        <!-- قسم الاتصال -->
        <div class="terms-section">
            <h3>Contact Information</h3>
            <p>If you have any questions about these Terms & Conditions, please contact us at:</p>
            <p>Email: support@cryptochecker.com</p>
            <p>Address: 123 Crypto Street, Blockchain City</p>
        </div>

        <!-- قسم Call-to-Action -->
        <div class="call-to-action">
            <a href="{{ route('contact.us') }}" class="btn-agree">I Agree to the Terms & Conditions</a>
        </div>
    </div>
@endsection
