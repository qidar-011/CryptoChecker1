@extends('website.layouts.app')

@section('title', 'About Us')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة About Us -->
    <link rel="stylesheet" href="{{ asset('website/css/aboutus.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة About Us -->
    <div class="container">
        <h2 class="header-title">About Us</h2>

        <!-- وصف قصير عن الموقع -->
        <p class="lead-text">
            Welcome to CryptoChecker - Your trusted platform for tracking crypto market trends, airdrops, and much more.
        </p>

        <!-- قسم عن الشركة -->
        <div class="about-card">
            <h3>Who We Are</h3>
            <p>
                CryptoChecker was founded with the vision of providing the cryptocurrency community with a comprehensive platform that simplifies the way they manage and track digital assets. From real-time market updates to alerts about upcoming airdrops, we strive to make crypto trading and investing easier and more accessible.
            </p>
        </div>

        <!-- قسم المهمة والرؤية -->
        <div class="about-card">
            <h3>Our Mission</h3>
            <p>
                Our mission is to empower individuals and businesses by giving them the tools they need to succeed in the fast-paced world of cryptocurrencies. We believe that through our platform, users will have access to the information they need to make informed decisions, monitor market trends, and stay ahead in the crypto world.
            </p>
        </div>

        <!-- قسم الفريق -->
        <div class="team-section">
            <h3>Meet the Team</h3>

            <div class="row">
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/120" alt="Team Member 1">
                        <h4>John Doe</h4>
                        <p>CEO & Founder</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/120" alt="Team Member 2">
                        <h4>Jane Smith</h4>
                        <p>CTO & Lead Developer</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/120" alt="Team Member 3">
                        <h4>Mike Johnson</h4>
                        <p>Marketing Director</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم الرؤية المستقبلية -->
        <div class="about-card">
            <h3>Our Vision</h3>
            <p>
                As we continue to grow, we aim to become the go-to platform for anyone looking to stay up to date with the latest developments in the cryptocurrency world. Whether you're a seasoned investor or just starting your crypto journey, CryptoChecker is here to support you every step of the way.
            </p>
        </div>

        <!-- قسم القيم -->
        <div class="about-card">
            <h3>Our Values</h3>
            <p>
                At CryptoChecker, we value transparency, innovation, and the trust of our users. We are committed to maintaining a platform that upholds these values while providing accurate and reliable data for the cryptocurrency community.
            </p>
        </div>

        <!-- قسم Call-to-Action -->
        <div class="call-to-action">
            <a href="#" class="btn-action">Learn More About Us</a>
        </div>
    </div>
@endsection
