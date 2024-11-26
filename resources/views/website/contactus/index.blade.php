@extends('website.layouts.app')

@section('title', 'Contact Us')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Contact Us -->
    <link rel="stylesheet" href="{{ asset('website/css/contactus.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Contact Us -->
    <div class="container">
        <h2 class="pricing-header">Contact Us</h2>

        <!-- نموذج الاتصال -->
        <div class="card shadow-sm mx-auto">
            <div class="card-body">
                <!-- عرض رسالة النجاح -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- عرض رسائل الخطأ -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <!-- الصف الأول: الاسم الكامل -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    </div>

                    <!-- الصف الثاني: البريد الإلكتروني والمحفظة -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="wallet" class="form-label">Wallet Address</label>
                            <input type="text" class="form-control" id="wallet" name="wallet" placeholder="Enter your wallet address" required>
                        </div>
                    </div>

                    <!-- الصف الثالث: عنوان الموضوع -->
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject" required>
                    </div>

                    <!-- الصف الرابع: نوع الاستشارة -->
                    <div class="mb-3">
                        <label for="consultation-type" class="form-label">Consultation Type</label>
                        <select class="form-select" id="consultation-type" name="consultation_type" required>
                            <option value="">Select consultation type</option>
                            <option value="technical-support">Technical Support</option>
                            <option value="airdrop-inquiries">Airdrop Inquiries</option>
                            <option value="account-issues">Account Issues</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- الصف الخامس: الرسالة -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your message" required></textarea>
                    </div>

                    <!-- زر الإرسال -->
                    <button type="submit" class="btn-submit">Send Message</button>
                </form>
            </div>
        </div>

        <!-- معلومات التواصل -->
        <div class="contact-info">
            <p>If you have any questions, feel free to reach out to us through the following ways:</p>
            <p>Email: <a href="mailto:support@cryptochecker.com">support@cryptochecker.com</a></p>
            <p>Phone: <a href="tel:+123456789">+123456789</a></p>
            <p>Address: 123 CryptoChecker St, Blockchain City, Cryptoland</p>
        </div>
    </div>
@endsection
