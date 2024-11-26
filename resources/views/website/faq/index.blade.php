@extends('website.layouts.app')

@section('title', 'FAQ')

@section('styles')
    <!-- تضمين ملف CSS الخاص بصفحة FAQ -->
    <link rel="stylesheet" href="{{ asset('website/css/faq.css') }}">
@endsection

@section('content')
    <!-- محتوى صفحة FAQ -->
    <div class="container">
        <h2 class="faq-header">Frequently Asked Questions</h2>

        <!-- سؤال 1 -->
        <div class="faq-card collapsible">
            <h4>What is CryptoChecker?</h4>
            <p>
                CryptoChecker is a platform that helps users track and monitor cryptocurrency prices, alerts, and market trends. It also provides information about upcoming airdrops, helping users stay informed.
            </p>
        </div>

        <!-- سؤال 2 -->
        <div class="faq-card collapsible">
            <h4>How do I subscribe to a Premium Plan?</h4>
            <p>
                To subscribe to our Premium Plan, simply navigate to the subscription page, choose the Premium Plan option, and follow the steps for payment. Once payment is complete, you will gain access to all premium features.
            </p>
        </div>

        <!-- سؤال 3 -->
        <div class="faq-card collapsible">
            <h4>Can I cancel my subscription anytime?</h4>
            <p>
                Yes, you can cancel your subscription anytime. No cancellation fees are applied, and you will continue to have access to premium features until the end of your current billing cycle.
            </p>
        </div>

        <!-- سؤال 4 -->
        <div class="faq-card collapsible">
            <h4>What payment methods are accepted?</h4>
            <p>
                We accept payments through major credit cards, PayPal, and cryptocurrency. More payment methods may be added in the future.
            </p>
        </div>

        <!-- سؤال 5 -->
        <div class="faq-card collapsible">
            <h4>How do I claim an airdrop?</h4>
            <p>
                You can claim an airdrop by visiting the Airdrop section on the website, reviewing the requirements for each airdrop, and following the provided instructions to claim it.
            </p>
        </div>

        <!-- قسم Call-to-Action -->
        <div class="call-to-action">
            <a href="{{ route('contact.us') }}" class="btn-contact">Still Have Questions? Contact Us</a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Toggle FAQ items after DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.faq-card.collapsible').forEach(function (card) {
                card.addEventListener('click', function () {
                    card.classList.toggle('active');
                });
            });
        });
    </script>
@endsection
