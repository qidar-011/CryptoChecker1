@extends('website.layouts.app')

@section('title', 'Support')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة Support -->
    <link rel="stylesheet" href="{{ asset('website/css/support.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة Support -->
    <div class="container">
        <h2 class="support-header">Support Center</h2>

        <!-- قسم المقدمة -->
        <div class="support-section">
            <h3>How Can We Help You?</h3>
            <p>If you have any questions, issues, or need assistance with our platform, we're here to help. Please feel free to reach out to our support team using the form below. Our team will respond as soon as possible.</p>
        </div>

        <!-- نموذج الدعم -->
        <div class="support-form">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('support.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- الاسم الكامل -->
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" value="{{ old('fullName') }}" required>
                    @error('fullName')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- البريد الإلكتروني -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- عنوان المحفظة -->
                <div class="form-group">
                    <label for="walletAddress">Wallet Address (optional)</label>
                    <input type="text" class="form-control" id="walletAddress" name="walletAddress" placeholder="Enter your wallet address" value="{{ old('walletAddress') }}">
                    @error('walletAddress')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- اختيار الموضوع -->
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select class="form-control" id="subject" name="subject" required>
                        <option value="" disabled selected>Select a subject</option>
                        <option value="general-inquiry" {{ old('subject') == 'general-inquiry' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="technical-issue" {{ old('subject') == 'technical-issue' ? 'selected' : '' }}>Technical Issue</option>
                        <option value="billing-issue" {{ old('subject') == 'billing-issue' ? 'selected' : '' }}>Billing Issue</option>
                        <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('subject')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- تحديد الأولوية -->
                <div class="form-group">
                    <label class="priority">Priority Level</label>
                    <select class="form-control" id="priority" name="priority" required>
                        <option value="" disabled selected>Select priority level</option>
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- الرسالة -->
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Describe your issue or question" required>{{ old('message') }}</textarea>
                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- ارفاق الملفات -->
                <div class="form-group">
                    <label for="attachment">Attach File (optional)</label>
                    <input type="file" class="form-control-file" id="attachment" name="attachment">
                    @error('attachment')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- زر الإرسال -->
                <div class="form-group text-center">
                    <button type="submit" class="btn-submit">Submit Request</button>
                </div>
            </form>
        </div>

        <!-- الأسئلة الشائعة -->
        <div class="faq-section">
            <h4>Frequently Asked Questions (FAQ)</h4>
            <p><strong>1. How can I reset my password?</strong></p>
            <p>To reset your password, <a href="#">click here</a> and follow the instructions.</p>
            <p><strong>2. How do I check my transaction history?</strong></p>
            <p>You can check your transaction history by logging into your account and navigating to the "Transaction History" section.</p>
            <p><strong>3. How do I contact support?</strong></p>
            <p>You can use the form above or reach us at <a href="mailto:support@cryptochecker.com">support@cryptochecker.com</a>.</p>
        </div>

        <!-- الاتصال بالدعم -->
        <div class="support-section">
            <h3>Other Ways to Contact Us</h3>
            <p>If you'd like to speak to us directly, you can contact us via email:</p>
            <p><a href="mailto:support@cryptochecker.com">support@cryptochecker.com</a></p>
            <p>For urgent inquiries, please call our support line at:</p>
            <p><a href="tel:+123456789">+1 234 567 89</a></p>
        </div>

        <!-- دعوة إلى التواصل -->
        <div class="call-to-action">
            <p>We're here to help you with any questions or concerns. Don't hesitate to reach out!</p>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // أي سكريبتات إضافية يمكن إضافتها هنا
    </script>
@endsection
