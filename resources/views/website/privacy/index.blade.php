@extends('website.layouts.app')

@section('title', 'Privacy Policy')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Privacy Policy -->
    <link rel="stylesheet" href="{{ asset('website/css/privacy.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Privacy Policy -->
    <div class="container">
        <h2 class="policy-header">Privacy Policy</h2>

        <!-- قسم المقدمة -->
        <div class="policy-section">
            <h3>Introduction</h3>
            <p>At CryptoChecker, we value your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website. Please read this policy carefully to understand our practices regarding your personal data.</p>
        </div>

        <!-- قسم البيانات التي نجمعها -->
        <div class="policy-section">
            <h3>Information We Collect</h3>
            <p>We collect several types of information, including:</p>
            <ul>
                <li><strong>Personal Information:</strong> Name, email address, wallet address, and other details you provide during registration.</li>
                <li><strong>Usage Data:</strong> Information about how you interact with our website, including IP address, browser type, and access times.</li>
                <li><strong>Cookies:</strong> We use cookies to enhance your experience on our site.</li>
            </ul>
        </div>

        <!-- قسم كيف نستخدم البيانات -->
        <div class="policy-section">
            <h3>How We Use Your Information</h3>
            <p>We may use the information we collect in the following ways:</p>
            <ul>
                <li>To provide, operate, and maintain our services.</li>
                <li>To improve and personalize your experience on our platform.</li>
                <li>To send you updates, newsletters, or promotional materials.</li>
                <li>To detect and prevent fraudulent activities on our platform.</li>
            </ul>
        </div>

        <!-- قسم مشاركة المعلومات -->
        <div class="policy-section">
            <h3>Sharing of Your Information</h3>
            <p>We do not share your personal information with third parties except in the following cases:</p>
            <ul>
                <li>If required by law or in response to a valid legal process.</li>
                <li>With trusted service providers that help us operate our platform, under strict confidentiality agreements.</li>
                <li>In connection with a merger, sale, or transfer of our business assets.</li>
            </ul>
        </div>

        <!-- قسم حماية البيانات -->
        <div class="policy-section">
            <h3>Data Security</h3>
            <p>We implement a variety of security measures to protect your personal information. However, please be aware that no method of data transmission over the internet or method of electronic storage is 100% secure.</p>
        </div>

        <!-- قسم حقوق المستخدم -->
        <div class="policy-section">
            <h3>Your Rights</h3>
            <p>You have the right to:</p>
            <ul>
                <li>Request access to the personal data we hold about you.</li>
                <li>Request correction or deletion of your personal data.</li>
                <li>Opt out of receiving marketing communications from us.</li>
            </ul>
        </div>

        <!-- قسم التعديلات على السياسة -->
        <div class="policy-section">
            <h3>Changes to this Policy</h3>
            <p>We may update this Privacy Policy from time to time. If we make any changes, we will notify you by posting the new policy on this page. You are encouraged to review this policy periodically to stay informed about how we protect your information.</p>
        </div>

        <!-- قسم الاتصال -->
        <div class="policy-section">
            <h3>Contact Us</h3>
            <p>If you have any questions or concerns about this Privacy Policy, please contact us at:</p>
            <p>Email: privacy@cryptochecker.com</p>
            <p>Address: 123 Crypto Street, Blockchain City</p>
        </div>

        <!-- قسم Call-to-Action -->
        <div class="call-to-action">
            <a href="{{ route('contact.us') }}" class="btn-agree">I Agree to the Privacy Policy</a>
        </div>
    </div>
@endsection
